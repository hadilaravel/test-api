<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimCard extends Model
{

    protected $fillable = ['number' , 'operator' , 'price' ,'description'];

}
