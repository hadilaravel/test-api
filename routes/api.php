<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::prefix('items')->group(function (){
   Route::get('/' ,[\App\Http\Controllers\Api\ItemController::class , 'index'] );
   Route::post('create' , [ItemController::class , 'create']);
});
