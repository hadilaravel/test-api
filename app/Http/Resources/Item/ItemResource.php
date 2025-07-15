<?php

namespace App\Http\Resources\Item;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ,
            'owner_name' => $this->owner_name,
            'item_code' => $this->item_code,
            'category' => $this->category,
            'type' => $this->type,
            'price_suggestion' => $this->price_suggestion,
            'location' => $this->location,
        ];
    }
}
