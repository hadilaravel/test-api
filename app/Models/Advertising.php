<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{

    protected $fillable = ['title' , 'status' ,'category_advertising_id' , 'user_id' , 'type' , 'description'];

    public function categoryAdvertising()
    {
        return $this->belongsTo(CategoryAdvertising::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function priceOffers()
    {
        return $this->hasMany(PriceOffer::class);
    }

}
