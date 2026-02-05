<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Upload to Public Folder
 * Upload an image and return its URL.
 *
 * @param  \Illuminate\Http\UploadedFile  $image
 * @param  string  $directory
 * @return string
 */
function uploadImage($file, $folder) {
    if (!$file->isValid()) {
        return null;
    }

    $imageName = Str::slug(time()) . rand() . '.' . $file->extension();
    $path      = public_path('uploads/' . $folder);
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    $file->move($path, $imageName);
    return 'uploads/' . $folder . '/' . $imageName;
}


/**
 * Upload to Storage Folder
 * Store a file in the specified folder within Laravel's storage directory and return its path.
 *
 * @return string
 */
function storeFile($file, $folder) {
    if (!$file->isValid()) {
        return null;
    }

    // Generate a unique file name
    $fileName = Str::slug(time() . '-' . uniqid()) . '.' . $file->getClientOriginalExtension();

    // Store the file in the specified folder within the storage/app directory
    $filePath = $file->storeAs($folder, $fileName, 'public');

    // Return the file path for reference
    return 'storage/' . $filePath; // e.g., "folder/filename.extension"
}


/**
 * Delete an image and return a boolean.
 *
 * @param  string  $imageUrl
 * @return bool
 */
function deleteImage($imageUrl)
{
    try {
        // Check if $imageUrl is a valid string
        if (is_string($imageUrl) && !empty($imageUrl)) {
            // Extract the relative path from the URL
            $parsedUrl = parse_url($imageUrl);
            $relativePath = $parsedUrl['path'] ?? '';

            // Remove the leading '/storage/' from the path
            $relativePath = preg_replace('/^\/?storage\//', '', $relativePath);

            // Check if the image exists
            if (Storage::disk('public')->exists($relativePath)) {
                // Delete the image if it exists
                Storage::disk('public')->delete($relativePath);
                return true;
            } else {
                // Return false if the image does not exist
                return false;
            }
        } else {
            // Return false if $imageUrl is not a valid string
            return false;
        }
    } catch (Exception $e) {
        // Handle any other exceptions
        return false;
    }
}



/**
 * Generate a unique slug for the given model and title.
 *
 * @param string $title
 * @param string $table
 * @param string $slugColumn
 * @return string
 */
function generateUniqueSlug($title, $table, $slugColumn = 'slug')
{
    // Generate initial slug
    $slug = str::slug($title);

    // Check if the slug exists
    $count = DB::table($table)->where($slugColumn, 'LIKE', "$slug%")->count();

    // If it exists, append the count
    return $count ? "{$slug}-{$count}" : $slug;
}


/**
 * Generate a unique 10-character SKU for a user based on timestamp and random string,
 * ensuring it does not already exist in the specified table.
 *
 * @param int $userId The user ID for whom the SKU is generated.
 * @param string $tableName The name of the table in which to check for SKU uniqueness.
 * @return string The generated SKU.
 */
function generateUniqueSKU($table, $column, $length = 10)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);

    do {
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // Check if SKU is already present in the table
        $exists = DB::table($table)->where($column, $randomString)->exists();
    } while ($exists);

    return $randomString;
}


  function parseAddress(string $fullAddress): array
    {
        $parts = array_map('trim', explode(',', $fullAddress));
        return [
            $parts[0] ?? '',
            $parts[1] ?? '',
            $parts[2] ?? '',
        ];
    }

    /**
     * Check if ATTOM property response is valid.
     */
     function isValidProperty($property): bool
    {
        if (is_object($property) && method_exists($property, 'getData')) {
            $data = $property->getData();
            return $data->status !== false;
        }

        return isset($property['address']);
    }

    /**
     * Extracts key property attributes into a simplified array.
     */
     function extractPropertyDetails(array $property): array
    {
        $street    = $property['address']['line1'] ?? '';
        $city      = $property['address']['locality'] ?? '';
        $zipcode   = $property['address']['postal1'] ?? '';
        $country   = $property['address']['country'] ?? '';
        $state     = $property['address']['countrySubd'] ?? '';

        $geoCode   = $property['location']['geoIdV4']['CS'] ?? null;
        $latitude  = $property['location']['latitude'] ?? null;
        $longitude = $property['location']['longitude'] ?? null;

        $rooms = $property['building']['rooms'] ?? [];
        $size  = $property['building']['size'] ?? [];

        $bedrooms      = $rooms['beds'] ?? null;
        $bathrooms     = $rooms['bathstotal'] ?? null;
        $squareFootage = $size['livingsize'] ?? null;
        $totalRooms    = $rooms['roomsTotal'] ?? null;


        // return ['bathroom' => $bathrooms,'bedroom'=>$bedrooms,'totalrooms'=>$totalRooms];

        // Estimate missing values
        if (!$bedrooms && $totalRooms && $bathrooms) {
            $bedrooms = $totalRooms - $bathrooms;
        }
        if (!$bathrooms && $totalRooms && $bedrooms) {
            $bathrooms = $totalRooms - $bedrooms;
        }

        return [
            'street'         => $street,
            'city'           => $city,
            'state'          => $state,
            'zipcode'        => $zipcode,
            'country'        => $country,
            'geo_code'       => $geoCode,
            'latitude'       => $latitude,
            'longitude'      => $longitude,
            'bedrooms'       => $bedrooms,
            'bathrooms'      => $bathrooms,
            'square_footage' => $squareFootage,
        ];
    }

    /**
     * Calculate average cash offer range based on comparable sales.
     */
     function calculateCashOfferPrice(array $properties): string
    {
        if (empty($properties)) {
            return 'N/A';
        }

        $total = array_sum(array_column($properties, 'sale_amount'));
        $count = count($properties);
        if ($count === 0) {
            return 'N/A';
        }

        $avgPrice = $total / $count;
        $low  =round( max(0, $avgPrice - 35000));
        $high = round(max(0, $avgPrice - 10000));

        return sprintf('$%s - $%s', number_format($low, 2), number_format($high, 2));
    }

    /**
     * Calculate Novation offer range based on property market value.
     */
     function calculateNovation(?float $price): string
    {
        if (!$price) {
            return 'N/A';
        }

        $adjusted = $price * 0.82;
        $low  = round($adjusted) - 35000;
        $high = round($adjusted) - 10000;

        return sprintf('$%d - $%d', $low, $high);
    }