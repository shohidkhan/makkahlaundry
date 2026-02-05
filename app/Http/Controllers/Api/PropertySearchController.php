<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ATTOMService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertySearchController extends Controller
{
    use ApiResponse;

    protected ATTOMService $attom;

    public function __construct(ATTOMService $attom)
    {
        $this->attom = $attom;
    }

    /**
     * Handle property search and valuation logic.
     */
    public function propertySearch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), $validator->errors()->first(), 422);
        }

        $user = auth()->user();

        if (!$user || !$user->hasActiveAccess()) {
            return $this->error([], 'Please upgrade or renew your plan.', 400);
        }

        $address = $request->input('address');
        [$street, $city, $state] = parseAddress($address);

        // ðŸ”¹ Get property details
        $property = $this->attom->getPropertyDetails($street, $city);
        // return $property;
        if (!isValidProperty($property)) {
            return $this->error([], 'Property details not found.', 400);
        }

        // ðŸ”¹ Extract key details
        $details = extractPropertyDetails($property);
        $propertyValues = $this->attom->getPropertyCurrentValues($street, $city);

        if (empty($details['bedrooms']) || empty($details['bathrooms'])) {
            return $this->error([], 'Property lacks sufficient room details.', 404);
        }

        // ðŸ”¹ Get comparable data & valuations
        $comparables = $this->attom->getComparableProperties(
            $details['square_footage'],
            $details['bedrooms'],
            $details['bathrooms'],
            $details['street'],
            $details['city'],
            $details['zipcode'],
            $details['country'],
            $details['state']
        );

        // return $comparables;

        //cash offer price range
        $cashOfferRange = calculateCashOfferPrice($comparables);

        // ðŸ”¹ Optional: Novation Offer Range for specific plans
        $novationOfferRange = null;
        if (in_array($user->currentSubscription()?->plan?->slug, ['the-strategist', 'the-deal-architect'])) {
            $novationOfferRange = calculateNovation($propertyValues);
        }

        // ðŸ”¹ Estimated Market Rent & Mortgage
        $creativeContractPrice = null;
        if (in_array($user->currentSubscription()?->plan?->slug, ['the-deal-architect'])) {

            $rentalData = $this->attom->getEstimatedMarketRentalValue($street, $city);
            $mortgageBalance = $this->attom->getEstimatedMortgageBalance($rentalData['attom_id']);

            //   return $mortgageBalance;

            $propertyAttomId = data_get($property, 'identifier.Id');
            if($mortgageBalance['amount'] > 0 ){
                $term = data_get($mortgageBalance, 'term');
                $mortgageAmount = data_get($mortgageBalance, 'amount');

               $creativeContractPrice = $this->attom->CalculateSubjectTpPrice($term,$mortgageAmount,$street,$city,$rentalData['estimated_market_rental_value_per_month'],$details['street'],$details['city'],$details['state'],$details['zipcode']);
            //   return $creativeContractPrice;
            }else{
                $creativeContractPrice =$this->attom->CalculateSellerCarry($propertyValues,$rentalData,$street,$city);
            }
        }

        // ðŸ”¹ Build response
        $data = [
            'property_details'       => $details,
            'cash_offer_range'       => $cashOfferRange,
            'comparable_properties'  => $comparables,
            'novation_offer_range'   => $novationOfferRange,
            'market_value'           => $propertyValues ?? null,
            'estimated_rent'         => $rentalData['estimated_market_rental_value_per_month'] ?? null,
            // 'estimated_mortgage'     => $mortgageBalance ?? null,
            'creative_contract_price' => $creativeContractPrice
        ];

        return $this->success($data, 'Property search results retrieved successfully.', 200);
    }
}