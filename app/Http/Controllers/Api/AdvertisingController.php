<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Http\Resources\Advertising\AdvertisingCollection;
use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{

    public function index()
    {
        $advertisings = Advertising::all();
        return response()->json([
            'advertisings' => new AdvertisingCollection($advertisings)
        ]);
    }

    public function activeAdvertising()
    {
        $advertisings = Advertising::query()->where('status' , 1)->get();
        return response()->json([
            'advertisings' => new AdvertisingCollection($advertisings)
        ]);
    }

    public function create(AdvertisingRequest $request)
    {

        $inputs = [
            'title' => $request->title,
            'status' => $request->status,
            'category_advertising_id' => $request->category_advertising_id,
            'user_id' => $request->user_id,
            'type' => $request->type,
            'description' => $request->description
        ];

        $advertising =  Advertising::query()->create($inputs);
        if($advertising) {
            return response()->json([
                'status' => 'success',
                'message' => 'آگهی با موفقیت ثبت شد',
            ], 201);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'آگهی با مشکل مواجه شد!',
            ], 422);
        }
    }

}
