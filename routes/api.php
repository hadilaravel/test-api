<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\SimCardController;
use App\Http\Controllers\Api\CategoryAdvertisingController;
use App\Http\Controllers\Api\AdvertisingController;
use App\Http\Controllers\Api\PriceOfferController;

Route::prefix('items')->group(function (){
   Route::get('/' ,[ItemController::class , 'index'] );
   Route::post('create' , [ItemController::class , 'create']);
});


Route::prefix('sim-cards')->group(function (){
    Route::get('/' , [SimCardController::class , 'index']);
    Route::post('create' , [SimCardController::class , 'create']);
});


Route::prefix('category-advertising')->group(function (){
    Route::get('/' , [CategoryAdvertisingController::class , 'index']);
    Route::get('active-categories' , [CategoryAdvertisingController::class , 'activeCategories']);
    Route::post('create' , [CategoryAdvertisingController::class , 'create']);
});


Route::prefix('advertising')->group(function (){
    Route::get('/' , [AdvertisingController::class , 'index']);
    Route::get('active-advertising' , [AdvertisingController::class , 'activeAdvertising']);
    Route::post('create' , [AdvertisingController::class , 'create']);
});

Route::prefix('price-offers')->group(function (){
    Route::get('/' , [PriceOfferController::class , 'index']);
    Route::post('create' , [PriceOfferController::class , 'create']);
});
