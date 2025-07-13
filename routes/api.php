<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::prefix('items')->group(function (){
   Route::get('/' ,[ItemController::class , 'index'] );
   Route::post('create' , [ItemController::class , 'create']);
});
