<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAdvertisngRequest;
use App\Http\Resources\Category\CategoryAdvertisingCollection;
use App\Models\CategoryAdvertising;
use Illuminate\Http\Request;

class CategoryAdvertisingController extends Controller
{

    public function index()
    {
        $categories = CategoryAdvertising::all();
        return response()->json([
           'categories' => new CategoryAdvertisingCollection($categories)
        ]);
    }

    public function activeCategories()
    {
        $categories = CategoryAdvertising::query()->where('status' , 1)->get();
        return response()->json([
            'categories' => new CategoryAdvertisingCollection($categories)
        ]);
    }

    public function create(CategoryAdvertisngRequest $request)
    {

        $inputs = [
          'name' => $request->name,
          'status' => $request->status
        ];

         $category =  CategoryAdvertising::query()->create($inputs);
        if($category) {
            return response()->json([
                'status' => 'success',
                'message' => 'دسته بندی با موفقیت ثبت شد',
            ], 201);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'دسته بندی با مشکل مواجه شد!',
            ], 422);
        }
    }

}
