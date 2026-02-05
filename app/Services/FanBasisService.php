<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class FanBasisService
{
    protected $apiKey;
    protected $base;
    protected $env;

    public function __construct()
    {
        $this->apiKey = config('services.fanbasis.key');
        // $this->env = config('services.fanbasis.env', 'production');
        $this->base = 'https://www.fanbasis.com/public-api';

        // $this->base = config('services.fanbasis.env') === 'sandbox'
        //     ? 'https://sandbox.fanbasis.com/public-api'
        //     : 'https://www.fanbasis.com/public-api';
    }

    protected function headers()
    {
        return [
            'x-api-key' => $this->apiKey,
            'Accept' => 'application/json'
        ];
    }

    public function createCheckoutSession(array $payload)
    {
        $resp = Http::withHeaders($this->headers())
                    ->asJson()
                    ->post("{$this->base}/checkout-sessions", $payload);

        return $resp;
    }

    // optional useful methods
    public function getCheckoutSession(string $id)
    {
        $resp = Http::withHeaders($this->headers())
                    ->get("{$this->base}/checkout-sessions/{$id}");
        return $resp->json();
    }

    public function cancelSubscription(string $checkoutSessionId, string $subscriptionId)
    {
        $resp = Http::withHeaders($this->headers())
                    ->delete("{$this->base}/checkout-sessions/{$checkoutSessionId}/subscriptions/{$subscriptionId}");
        return $resp->json();
    }
}
