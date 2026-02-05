<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use App\Services\FanBasisService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    use ApiResponse;
    protected $fan;

    public function __construct(FanBasisService $fan)
    {
        $this->fan = $fan;
    }

    /**
     * Create checkout session for selected plan
     */
    public function createCheckout(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'plan_id' => 'required|exists:plans,id',
            'success_url' => 'required|url'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 422);
        }

        $plan = Plan::find($request->plan_id);

        // 3 days trial if not used yet
        $freeTrialDays = !$user->is_trial ? 3 : 0;

        $payload = [
            'product' => [
                'title' => $plan->name,
                'description' => "Subscription to {$plan->name}",
            ],
            'amount_cents' => $plan->price * 100,
            'type' => 'subscription',
            'subscription' => [
                'frequency_days' => 30,
                'free_trial_days' => $freeTrialDays,
                'auto_expire_after_x_periods' => 9999 // 0 = renew indefinitely
            ],
            'success_url' => $request->success_url,
            'webhook_url' => route('api.fanbasis.webhook'),
        ];

        $resp = $this->fan->createCheckoutSession($payload);

        return $resp;

        if (!isset($resp['data']['payment_link'])) {
            Log::error('Fanbasis Checkout Failed', ['response' => $resp]);
            return response()->json([
                'error' => 'Failed to create checkout session',
                'detail' => $resp
            ], 500);
        }

        // Save subscription temporarily (trial pending)
        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'session_id' => $resp['data']['checkout_session_id'],
            'fanbasis_subscription_id' => $resp['data']['id'] ?? null,
            'status' => $freeTrialDays > 0 ? 'trial' : 'pending',
            'trial_end_at' => $freeTrialDays > 0 ? now()->addDays($freeTrialDays) : null,
        ]);

        // Mark trial used
        if ($freeTrialDays > 0 && !$user->is_trial) {
            $user->update(['is_trial' => true]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Checkout session created successfully',
            'data' => [
                'payment_link' => $resp['data']['payment_link']
            ]
        ]);
    }

    /**
     * Handle Fanbasis Webhook
     */
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        Log::info('fanbasis_webhook', $payload);

        $event = data_get($payload, 'event_type');
        $fanSubId = data_get($payload, 'data.id');

        if (!$fanSubId) {
            return response()->json(['message' => 'Missing subscription id'], 400);
        }

        $subscription = Subscription::where('fanbasis_subscription_id', $fanSubId)->latest()->first();

        if (!$subscription) {
            Log::warning("Subscription not found for fanbasis id {$fanSubId}");
            return response()->json(['message' => 'subscription not found'], 404);
        }

        switch ($event) {
            case 'subscription.started':
                $subscription->update([
                    'status' => 'active',
                    'end_at' => now()->addMonth(),
                ]);
                break;

            case 'subscription.renewed':
                $subscription->update([
                    'status' => 'active',
                    'end_at' => now()->addMonth(),
                ]);
                break;

            case 'subscription.canceled':
                $subscription->update([
                    'status' => 'canceled',
                ]);
                break;
        }

        return response()->json(['message' => 'ok']);
    }

    public function cancelSubscription(Request $request){

        $user = auth()->user();

        if(!$user->currentSubscription()){
            return $this->error([], 'You have no active subscription', 400);
        }
        $subscription = $user->currentSubscription();

        $sessionId = $subscription->session_id;
        $subscriptionId = $subscription->fanbasis_subscription_id;

         $resp = $this->fan->cancelSubscription($sessionId, $subscriptionId);

         if (isset($resp['status']) && $resp['status'] === 'success') {
            $subscription->update([
                'status' => 'cancelled'
            ]);

            return $this->error($resp['data'] ?? [], 'Subscription cancelled successfully', 200);
        }
    }
}
