<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\SimCardController;


Route::prefix('items')->group(function (){
   Route::get('/' ,[ItemController::class , 'index'] );
   Route::post('create' , [ItemController::class , 'create']);
});


Route::prefix('sim-cards')->group(function (){
    Route::get('/' , [SimCardController::class , 'index']);
    Route::post('create' , [SimCardController::class , 'create']);
});
