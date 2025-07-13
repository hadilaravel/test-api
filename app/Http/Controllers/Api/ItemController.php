<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\Item\ItemCollection;
use App\Models\Item;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA; // <--- این خط بسیار مهم است! مطمئن شوید که وجود دارد.


/**
 * @OA\Info(
 * version="1.0.0",
 * title="API Test Documentation",
 * description="این یک API تستی برای بررسی Swagger است",
 * @OA\Contact(
 * email="test@example.com"
 * )
 * )
 *
 * @OA\Server(
 * url=L5_SWAGGER_CONST_HOST,
 * description="سرور API محلی"
 * )
 *
 * @OA\Tag(
 * name="Items",
 * description="مدیریت آیتم‌ها"
 * )
 * @OA\Tag(
 * name="تست",
 * description="Endpointهای تستی برای Swagger"
 * )
 */
class ItemController extends Controller
{

    /**
     * @OA\Get(
     * path="/api/items",
     * operationId="getItemsList",
     * tags={"Items"},
     * summary="دریافت لیست آیتم‌ها",
     * description="این Endpoint لیست تمام آیتم‌ها را برمی‌گرداند.",
     * @OA\Response(
     * response=200,
     * description="عملیات موفقیت‌آمیز",
     * @OA\JsonContent(
     * type="array",
     * @OA\Items(
     * @OA\Property(property="id", type="integer", example=1),
     * @OA\Property(property="owner_name", type="string", example="نام مالک"),
     * @OA\Property(property="item_code", type="string", example="09123456789"),
     * @OA\Property(property="category", type="string", example="res"),
     * @OA\Property(property="type", type="string", example="type_value"),
     * @OA\Property(property="price_suggestion", type="number", format="float", example=1500000),
     * @OA\Property(property="location", type="string", example="موقعیت مکانی")
     * )
     * )
     * ),
     * @OA\Response(
     * response=401,
     * description="خطای احراز هویت"
     * )
     * )
     */
    public function index()
    {
        $items = Item::all();
        return response()->json([
            'items' => new ItemCollection($items)
        ]);
    }

    /**
     * @OA\Post(
     * path="/api/items",
     * operationId="createItem",
     * tags={"Items"},
     * summary="ایجاد آیتم جدید",
     * description="این Endpoint یک آیتم جدید را در سیستم ثبت می‌کند.",
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(
     * required={"owner_name", "item_code", "category", "type", "price_suggestion", "location"},
     * @OA\Property(property="owner_name", type="string", example="نام مالک"),
     * @OA\Property(property="item_code", type="string", example="09123456789"),
     * @OA\Property(property="category", type="string", enum={"res", "dos", "kos"}, example="res"),
     * @OA\Property(property="type", type="string", example="type_value"),
     * @OA\Property(property="price_suggestion", type="number", format="float", example=1500000),
     * @OA\Property(property="location", type="string", example="موقعیت مکانی")
     * )
     * ),
     * @OA\Response(
     * response=201,
     * description="آیتم با موفقیت ایجاد شد",
     * @OA\JsonContent(
     * @OA\Property(property="status", type="string", example="success"),
     * @OA\Property(property="message", type="string", example="آگهی با موفقیت ثبت شد"),
     * @OA\Property(property="data", type="object",
     * @OA\Property(property="id", type="integer", example=1),
     * @OA\Property(property="item_code", type="string", example="09123456789")
     * )
     * )
     * ),
     * @OA\Response(
     * response=422,
     * description="خطای اعتبارسنجی یا مشکل در ثبت آگهی",
     * @OA\JsonContent(
     * @OA\Property(property="status", type="string", example="error"),
     * @OA\Property(property="message", type="string", example="آگهی با مشکل مواجه شد!"),
     * @OA\Property(property="errors", type="object", example={})
     * )
     * )
     * )
     */
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
