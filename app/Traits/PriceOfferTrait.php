<?php

namespace App\Traits;

trait PriceOfferTrait
{

    public static function generateUniqueOfferId()
    {
        $maxAttempts = 10;
        $attempts = 0;

        do {
            $attempts++;
            $newOfferId = mt_rand(1000000000, 9999999999);

            $exists = self::where('offer_id', $newOfferId)->exists();

            if ($attempts >= $maxAttempts) {
                throw new \Exception("Failed to generate a unique offer_id after {$maxAttempts} attempts.");
            }

        } while ($exists);

        return $newOfferId;
    }


}
