<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SimCardRequest;
use App\Http\Resources\SimCard\SimCardCollection;
use App\Models\SimCard;
use Illuminate\Http\Request;

class SimCardController extends Controller
{

    public function index()
    {
        $simCards = SimCard::all();
        return response()->json([
           'simCards' => new SimCardCollection($simCards)
        ]);
    }

    public function create(SimCardRequest $request)
    {

        $inputs = [
          'number' => $request->number,
           'operator' => $request->operator,
          'price' => $request->price,
          'description' => $request->description,
        ];

        $simCard = SimCard::query()->create($inputs);
        if($simCard) {
            return response()->json([
                'status' => 'success',
                'message' => 'آگهی با موفقیت ثبت شد',
                'data' => [
                    'id' => $simCard->id,
                    'number' => $simCard->number
                ]
            ], 201);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'آگهی با مشکل مواجه شد!',
            ], 422);
        }

    }

}
