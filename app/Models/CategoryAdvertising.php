<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAdvertising extends Model
{

    protected $fillable = ['name' , 'status'];

    public function advertisings()
    {
        return $this->hasMany(Advertising::class);
    }

}
