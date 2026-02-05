<?php

namespace App\Services;

use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class ATTOMService
{
    use ApiResponse;

    protected string $baseUrl;
    protected string $apiKey;
    protected array $defaultHeaders;

    public function __construct()
    {
        // NOTE: original code used 'services.atom', so keeping that key to avoid breaking changes.
        $this->baseUrl = rtrim(config('services.atom.baseurl', ''), '/');
        $this->apiKey = config('services.atom.api_key', '');

        $this->defaultHeaders = [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'apikey' => $this->apiKey,
        ];
    }

    /* ------------------------------------------------------------------------
     | Public API
     |------------------------------------------------------------------------ */

    /**
     * Return property detail array or null on failure.
     *
     * @param string $address1
     * @param string $address2
     * @return array|null
     */
    public function getPropertyDetails(string $address1, string $address2): ?array
    {
        $endpoint = "{$this->baseUrl}/propertyapi/v1.0.0/sale/detail";
        $response = $this->request('GET', $endpoint, [
            'address1' => $address1,
            'address2' => $address2,
        ]);
        // return $response;
        // Expected structure: ['property' => [ ... ]]
        $statusCode = data_get($response, 'status.code');

        if ($statusCode !== null && $statusCode != 0) {
            Log::warning('ATTOM getPropertyDetails failed', ['response' => $response]);
            return null;
        }


        return $response['property'][0] ?? null;
    }


    //  subject to price calculate

    public function CalculateSubjectTpPrice($term, $mortgageAmount, $address1, $address2, $estimatedRentPerMonth, $street, $city, $state, $zip)
{
    $endpoint = "{$this->baseUrl}/propertyapi/v1.0.0/property/basicprofile";
    $response = $this->request('GET', $endpoint, [
        'address1' => $address1,
        'address2' => $address2,
    ]);

    // rentcast api execution (placeholder)
    $tax = $response['property'][0]['assessment']['tax']['taxAmt'] ?? 0;

    $monthlyTax = $tax / 12;
    $homeInsurance = 210;
    $hoaFee = 65;

    // return ['term' => $term];

    // ✅ Prevent division by zero
    if (empty($term) || $term == 0) {
        return [
            'error' => 'Invalid loan term. Term must be greater than zero.'
        ];
    }

    $monthlyMortgage = $mortgageAmount / $term;

    $s1 = abs($estimatedRentPerMonth - ($monthlyMortgage + $monthlyTax + $homeInsurance + $hoaFee + 300));
    $s2 = $s1 / 0.12;
    $s3 = $s2 * 12;

    return [
        'cashToSeller' => round($s3)
    ];
}


 public function CalculateSellerCarry($propertyCurrentValue, $estimatedRentPerMonth, $address1, $address2)
{
    $endpoint = "{$this->baseUrl}/propertyapi/v1.0.0/property/basicprofile";
    $response = $this->request('GET', $endpoint, [
        'address1' => $address1,
        'address2' => $address2,
    ]);

    // ✅ Safely extract tax amount
    $tax = $response['property'][0]['assessment']['tax']['taxAmt'] ?? 0;
    if (is_array($tax)) {
        $tax = 0;
    }

    $monthlyTax = $tax / 12;
    $homeInsurance = 210;
    $hoaFee = 65;

    $propertyCurrentValue = floatval($propertyCurrentValue);
    $estimatedRentPerMonth = floatval($estimatedRentPerMonth);

    $downPayment = $propertyCurrentValue * 0.1;
    $s1 = abs($estimatedRentPerMonth - ($monthlyTax + $homeInsurance + $hoaFee + 300));
    $monthlyMaxPayment = ($downPayment * 0.12) / 12;
    $s3 = floatval($s1) - floatval($monthlyMaxPayment);

    $b1 = ($propertyCurrentValue * 0.75) - 12000;
    $b2 = $propertyCurrentValue - $b1;

    if ($monthlyMaxPayment == 0) {
        $baloonPayment = 0;
    } else {
        $baloonPayment = ($b2 / $monthlyMaxPayment) / 12;
    }
    $data = [
        'sellerCarry' => [
            'monthlyMaxPayment' => round($monthlyMaxPayment),
            'baloonPayment' => round($baloonPayment),
            'downPayment' => round($downPayment),
        ]
    ];

return $data;


    // ✅ Format all float values to 2 decimal places
    return $data;
}



    /**
     * Get comparable properties filtered by size/bed/bath and price.
     *
     * Returns an indexed array of comparables with keys:
     *  - attom_id, address, sale_amount (float), investor_name, sale_date, bedrooms, bathrooms, sqft
     *
     * @return array
     */
    public function getComparableProperties(

        ?float $sqft,
        ?int $bedrooms,
        ?int $bathrooms,
        string $street,
        string $city,
        string $zipcode,
        string $country,
        string $state,
        $subjectPrice = null
    ): array {
        // Build endpoint — reuse the one you used originally
        $endpoint = "{$this->baseUrl}/property/v2/salescomparables/address/"
            . rawurlencode($street) . '/'
            . rawurlencode($city) . '/'
            . rawurlencode($country) . '/'
            . rawurlencode($state) . '/'
            . rawurlencode($zipcode);

        $query = [
            'searchType' => 'Radius',
            'miles' => 5,
            'maxComps' => 500,
            'saleDateRange' => 12,
        ];

        $response = $this->request('GET', $endpoint, $query);
        if (empty($response)) {
            return [];
        }

        // Normalized path safety
        $salesData = data_get($response, 'RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.PROPERTY_INFORMATION_RESPONSE_ext.SUBJECT_PROPERTY_ext.PROPERTY', []);
        if (!$salesData || !is_array($salesData)) {
            return [];
        }

        $results = [];

        // Skip first entry if it's the subject property
        foreach (array_slice($salesData, 1) as $item) {
            $amount = data_get($item, 'COMPARABLE_PROPERTY_ext.SALES_HISTORY.@PropertySalesAmount');
            $saleDate = data_get($item, 'COMPARABLE_PROPERTY_ext.SALES_HISTORY.@TransferDate_ext');

            if ($amount === null || !is_numeric($amount) || (float)$amount == 0.0) {
                continue;
            }

            $compStreet = data_get($item, 'COMPARABLE_PROPERTY_ext.@_StreetAddress');
            $compCity = data_get($item, 'COMPARABLE_PROPERTY_ext.@_City');
            $compState = data_get($item, 'COMPARABLE_PROPERTY_ext.@_State');
            $compZip = data_get($item, 'COMPARABLE_PROPERTY_ext.@_PostalCode');

            $compFullAddress = trim(implode(', ', array_filter([$compStreet, $compCity, $compState . ' ' . $compZip])));

            $investorName = data_get($item, 'COMPARABLE_PROPERTY_ext._OWNER.@_Name');
            $attomId = data_get($item, 'COMPARABLE_PROPERTY_ext._IDENTIFICATION.@RTPropertyID_ext');

            $compLivingSize = data_get($item, 'COMPARABLE_PROPERTY_ext.STRUCTURE.@GrossLivingAreaSquareFeetCount');
            $compTotalRooms = data_get($item, 'COMPARABLE_PROPERTY_ext.STRUCTURE.@TotalRoomCount');
            $compBathrooms = data_get($item, 'COMPARABLE_PROPERTY_ext.STRUCTURE.@TotalBathroomFullCount_ext');

            $compBedrooms = null;
            if ($compTotalRooms !== null && $compBathrooms !== null) {
                $compBedrooms = (int)$compTotalRooms - (int)$compBathrooms;
                if ($compBedrooms < 0) {
                    $compBedrooms = null;
                }
            }

            $results[] = [
                'attom_id' => $attomId,
                'address' => $compFullAddress,
                'sale_amount' => (float)$amount,
                'investor_name' => $investorName,
                'sale_date' => $saleDate,
                'bedrooms' => $compBedrooms,
                'bathrooms' => $compBathrooms !== null ? (int)$compBathrooms : null,
                'sqft' => $compLivingSize !== null ? (float)$compLivingSize : null,
            ];
        }

        // return $results;

        // Filtering pipeline
        $filtered = $this->filterBedBathSize($results, $bedrooms, $bathrooms, $sqft);

        // return $filtered;
        $filtered = $this->mortgageFilter($filtered);

        $filtered = $this->investorFilter($filtered);
        // return $filtered;
        $filtered = $this->priceFilter($filtered, $subjectPrice);

        return $filtered;
    }

    /**
     * Return current property market value (float) or null.
     *
     * The method first tries the AVM endpoint, then falls back to basic profile.
     *
     * @param string $address1
     * @param string $address2
     * @return float|null
     */
    public function getPropertyCurrentValues(string $address1, string $address2): ?float
    {
        $endpointAvm = "{$this->baseUrl}/propertyapi/v1.0.0/attomavm/detail";

        $response = $this->request('GET', $endpointAvm, [
            'address1' => $address1,
            'address2' => $address2,
        ]);

        // $currentValue = data_get($response, 'property.0.assessment.market.mktTtlValue');
        $currentValue = data_get($response, 'property.0.assessment.market.mktttlvalue');
        if ($currentValue !== null && is_numeric($currentValue)) {
            return (float)$currentValue;
        }

       return $currentValue;
    }

    /**
     * Return rental estimation array: ['attom_id' => string|null, 'estimated_market_rental_value_per_month' => float]
     *
     * @param string $address1
     * @param string $address2
     * @return array
     */
    public function getEstimatedMarketRentalValue(string $address1, string $address2): array
    {
        $endpoint = "{$this->baseUrl}/propertyapi/v1.0.0/valuation/rentalavm";
        $response = $this->request('GET', $endpoint, [
            'address1' => $address1,
            'address2' => $address2,
        ]);

        $estimated = data_get($response, 'property.0.rentalAvm.estimatedRentalValue', 0);
        $attomId = data_get($response, 'status.attomId', null);

        return [
            'attom_id' => $attomId,
            'estimated_market_rental_value_per_month' => is_numeric($estimated) ? (float)$estimated : 0.0,
        ];
    }

    /**
     * Return estimated mortgage balance for an attomId or null
     *
     * @param string|null $attomId
     * @return float|null
     */
    public function getEstimatedMortgageBalance(?string $attomId)
    {
        if (empty($attomId)) {
            return null;
        }

        $endpoint = "{$this->baseUrl}/propertyapi/v1.0.0/property/detailmortgage";
        $response = $this->request('GET', $endpoint, ['attomid' => $attomId]);

        $amount = data_get($response, 'property.0.mortgage.amount');
        $term  = data_get($response, 'property.0.mortgage.term');

        $data = [];

        if($amount > 0){
            $data['amount'] = $amount;
            $data['term'] = $term;
        }else{
            $data['amount'] = 0;
        }


        return $data;
    }




    /* ------------------------------------------------------------------------
     | Protected / Helper Methods
     |------------------------------------------------------------------------ */

    /**
     * Perform an HTTP request and return decoded json array or null on failure.
     * Centralizes headers, query building and error handling.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $query
     * @return array|null
     */
    protected function request(string $method, string $endpoint, array $query = []): ?array
    {
        try {
            // Use Laravel HTTP client
            $response = Http::withHeaders($this->defaultHeaders)
                ->retry(2, 100) // small retry policy
                ->timeout(90)
                ->{$this->normalizeMethod($method)}($endpoint, $query);

            // Ensure valid JSON
            $json = $response->json();

            if (empty($json)) {
                return null;
            }

            return is_array($json) ? $json : null;
        } catch (Throwable $e) {
            Log::error('ATTOM HTTP request failed', [
                'endpoint' => $endpoint,
                'query' => $query,
                'message' => $e->getMessage(),
            ]);
            return null;
        }
    }

    /**
     * Normalize HTTP method to a safe callable name.
     */
    protected function normalizeMethod(string $method): string
    {
        $m = strtoupper($method);
        return in_array($m, ['GET', 'POST', 'PUT', 'DELETE']) ? strtolower($m) : 'get';
    }

    /**
     * Filter comparables by beds/baths/size.
     *
     * @param array $properties
     * @param int|null $bedrooms
     * @param int|null $bathrooms
     * @param float|null $sqft
     * @return array
     */
    protected function filterBedBathSize(array $properties, $bedrooms, $bathrooms, $sqft): array
    {
        if (empty($properties) || !$sqft || !$bedrooms || !$bathrooms) {
            return $properties;
        }

        $filtered = [];
        $percentSqft = $sqft * 0.20;
        $lowerSqft = $sqft - $percentSqft;
        $upperSqft = $sqft + $percentSqft;

        foreach ($properties as $prop) {
            $compSqft = $prop['sqft'] ?? null;
            $compBeds = $prop['bedrooms'] ?? null;
            $compBaths = $prop['bathrooms'] ?? null;

            if ($compSqft === null || $compBeds === null || $compBaths === null) {
                continue;
            }

            $sizeMatch = ($compSqft >= $lowerSqft && $compSqft <= $upperSqft);
            $diffBeds = (int)$bedrooms - (int)$compBeds;
            $diffBaths = (int)$bathrooms - (int)$compBaths;

            $bedBathMatch = (
                ($diffBeds === 0 && $diffBaths === 0) ||
                (abs($diffBeds) === 1 && $diffBaths === 0) ||
                ($diffBeds === 0 && abs($diffBaths) === 1)
            );

            if ($sizeMatch && $bedBathMatch) {
                $filtered[] = $prop;
            }
        }

        return $filtered;
    }

    /**
     * Remove properties that have large mortgages / owner not matching criteria.
     *
     * Returns only properties that are likely good comps (no mortgage or short term).
     *
     * @param array $properties
     * @return array
     */
   protected function mortgageFilter(array $properties): array
{
    if (empty($properties)) {
        return [];
    }

    // Extract valid ATTOM IDs
    $attomIds = [];
    $idToPropMap = [];

    foreach ($properties as $prop) {
        $attomId = $prop['attom_id'] ?? null;
        if ($attomId && !isset($idToPropMap[$attomId])) {
            $attomIds[] = $attomId;
            $idToPropMap[$attomId] = $prop;
        }
    }

    if (empty($attomIds)) {
        return $properties; // No IDs → keep all
    }

    $batchSize = 100; // ATTOM allows up to 100 per batch
    $chunks = array_chunk($attomIds, $batchSize);
    $validProperties = [];

    foreach ($chunks as $chunk) {
        $batchPayload = $this->buildMortgageBatchPayload($chunk);
        $batchEndpoint = "{$this->baseUrl}/propertyapi/v1.0.0/property/batch";

        $response = $this->request('POST', $batchEndpoint, $batchPayload);

        if (empty($response['responses'])) {
            // On batch failure, keep all in chunk as fallback
            foreach ($chunk as $id) {
                if (isset($idToPropMap[$id])) {
                    $validProperties[] = $idToPropMap[$id];
                }
            }
            continue;
        }

        foreach ($response['responses'] as $index => $resp) {
            $attomId = $chunk[$index] ?? null;
            if (!$attomId || !isset($idToPropMap[$attomId])) {
                continue;
            }

            $prop = $idToPropMap[$attomId];

            // Extract mortgage data
            $mortgage = data_get($resp, 'property.0.mortgage', []);
            $amount = data_get($mortgage, 'amount');
            $term = data_get($mortgage, 'term');

            // Keep if: no mortgage OR short term (<= 18 months)
            if (empty($amount) || ($term !== null && is_numeric($term) && (int)$term <= 18)) {
                $validProperties[] = $prop;
            }
            // Else: skip (has large mortgage)
        }
    }

    return $validProperties;
}

private function buildMortgageBatchPayload(array $attomIds): array
{
    $requests = array_map(function ($attomId) {
        return [
            'path' => '/property/detailmortgageowner',
            'query' => ['attomid' => $attomId],
            'method' => 'GET'
        ];
    }, $attomIds);

    return ['requests' => $requests];
}

    /**
     * Filter comparables by price relative to the subject price.
     *
     * @param array $properties
     * @param float|int|null $subjectPrice
     * @return array
     */
    protected function priceFilter(array $properties, $subjectPrice): array
    {
        if (empty($properties) || empty($subjectPrice) || !is_numeric($subjectPrice)) {
            return $properties;
        }

        $filtered = [];
        $subject = (float)$subjectPrice;
        $multiplier = 2.0; // allow up to 2x difference (same as original intention)

        foreach ($properties as $prop) {
            $compPrice = $prop['sale_amount'] ?? null;
            if ($compPrice === null || !is_numeric($compPrice)) {
                continue;
            }

            $compPrice = (float)$compPrice;
            if (abs($compPrice - $subject) > ($multiplier * $subject)) {
                continue;
            }

            $filtered[] = $prop;
        }

        return $filtered;
    }

    /**
     * Optional investor filter: return properties where owner name contains common investor suffixes.
     * (Left here for reuse — not used by default pipeline)
     *
     * @param array $properties
     * @return array
     */
    protected function investorFilter(array $properties): array
    {
        $filtered = [];
        $suffixes = ['Corp', 'LLP', 'LLC', 'LP', 'INC', 'Holdings', 'Properties', 'Investments', 'Capital', 'Enterprises'];

        foreach ($properties as $prop) {
            $ownerName = $prop['investor_name'] ?? '';
            if (Str::contains($ownerName, $suffixes)) {
                $filtered[] = $prop;
            }
        }

        return $filtered;
    }
}
