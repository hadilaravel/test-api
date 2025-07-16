<?php

namespace App\Http\Resources\Advertising;

use App\Http\Resources\PriceOffer\PriceOfferResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisingResource extends JsonResource
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
            'title' => $this->title,
            'status' => $this->status,
            'category_advertising_id' => $this->category_advertising_id,
            'category_name' => $this->categoryAdvertising->name ,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name ,
            'type' => $this->type,
            'description' => $this->description,
            'priceOffers' => PriceOfferResource::collection($this->priceOffers) ?? '-'
        ];
    }
}
