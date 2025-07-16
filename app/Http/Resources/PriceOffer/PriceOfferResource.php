<?php

namespace App\Http\Resources\PriceOffer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceOfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'offer_id' => $this->offer_id,
            'advertising_id' => $this->advertising_id,
            'advertising_name' => $this->advertising->title ?? '-'
        ];
    }
}
