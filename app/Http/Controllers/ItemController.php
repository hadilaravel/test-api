<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\Item\ItemCollection;
use App\Models\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{



    public function index()
    {
        $items = Item::all();
        return response()->json([
           'items' => new ItemCollection($items)
        ]);
    }

    public function create(ItemRequest $itemRequest)
    {
        $inputs = [
            'owner_name' => $itemRequest->owner_name,
            'item_code' => $itemRequest->item_code,
            'category' => $itemRequest->category,
            'type' => $itemRequest->type,
            'price_suggestion' => $itemRequest->price_suggestion,
            'location' => $itemRequest->location,
        ];

        $item = Item::query()->create($inputs);
        if($item) {
            return response()->json([
                'status' => 'success',
                'message' => 'آگهی با موفقیت ثبت شد',
                'data' => [
                    'id' => $item->id,
                    'item_code' => $item->item_code
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
