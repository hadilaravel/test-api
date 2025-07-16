<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceOfferRequest;
use App\Http\Resources\PriceOffer\PriceOfferCollection;
use App\Models\PriceOffer;
use Illuminate\Http\Request;

class PriceOfferController extends Controller
{

    public function index()
    {
        $priceOffers = PriceOffer::all();
        return response()->json([
            'priceOffers' => new PriceOfferCollection($priceOffers)
        ]);
    }


    public function create(PriceOfferRequest $request)
    {

        $inputs = [
            'advertising_id' => $request->advertising_id,
            'price' => $request->price,
            'status' => $request->status
        ];

        $priceOffer =  PriceOffer::query()->create($inputs);
        if($priceOffer) {
            return response()->json([
                'status' => 'success',
                'message' => 'فیمت پیشنهادی آگهی با موفقیت ثبت شد',
            ], 201);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'قیمت پیشنهادی آگهی با مشکل مواجه شد!',
            ], 422);
        }
    }

}
