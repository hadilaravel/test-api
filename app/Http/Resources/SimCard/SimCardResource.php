<?php

namespace App\Http\Resources\SimCard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SimCardResource extends JsonResource
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
        'number' => $this->number,
        'operator' => $this->operator,
        'price' => $this->price,
        'description' => $this->description,
       ];
    }
}
