<?php

namespace App\Models;

use App\Traits\PriceOfferTrait;
use Illuminate\Database\Eloquent\Model;

class PriceOffer extends Model
{

    use PriceOfferTrait;

    protected $fillable = ['advertising_id' , 'price' , 'offer_id' , 'status'];

    public function advertising()
    {
        return $this->belongsTo(Advertising::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->offer_id = self::generateUniqueOfferId();
        });
    }

}
