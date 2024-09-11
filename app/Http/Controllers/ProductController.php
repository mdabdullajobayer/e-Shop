<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\ProductCart;
use App\Models\ProductDetails;
use App\Models\ProductReview;
use App\Models\Products;
use App\Models\ProductSlider;
use App\Models\ProductWishes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ListProductbyCategory(Request $request): JsonResponse
    {
        $data = Products::where('category_id', $request->id)
            ->with('brand', 'category')
            ->get();
        return ResponseHelper::Out('sucess', $data, 200);
    }

    public function ListProductbyRemark(Request $request): JsonResponse
    {
        $data = Products::where('remark', $request->remark)
            ->with('brand', 'category')
            ->get();
        return ResponseHelper::Out('sucess', $data, 200);
    }

    public function ListProductbyBrand(Request $request): JsonResponse
    {
        $data = Products::where('brand_id', $request->brand_id)
            ->with('brand', 'category')
            ->get();
        return ResponseHelper::Out('success', $data, 200);
    }

    public function ListProductbySlider(): JsonResponse
    {
        $data = ProductSlider::all();
        return ResponseHelper::Out('success', $data, 200);
    }

    public function ProductDetailsbyId(Request $request): JsonResponse
    {
        $data = ProductDetails::where('product_id', $request->input('id'))
            ->with('product', 'product.brand', 'product.category')
            ->get();
        return ResponseHelper::Out('success', $data, 200);
    }

    public function ListReviewProduct(Request $request): JsonResponse
    {
        $data = ProductReview::where('product_id', $request->input('product_id'))
            ->with(['profile' => function ($query) {
                $query->select('id', 'cus_name');
            }]);
        return ResponseHelper::Out('success', $data, 200);
    }

    //Product Wishes
    public function ProductWishList(Request $request): JsonResponse
    {
        $user_id = $request->header('id');
        $data = ProductWishes::where('user_id', $user_id)->with('product')->get();
        return ResponseHelper::Out('success', $data, 200);
    }

    public function CreateWishList(Request $request): JsonResponse
    {
        $user_id = $request->header('id');
        $data = ProductWishes::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $request->product_id],
            ['user_id' => $user_id, 'product_id' => $request->product_id],
        );
        return ResponseHelper::Out('success', $data, 200);
    }


    public function RemoveWishList(Request $request): JsonResponse
    {
        $user_id = $request->header('id');
        $data = ProductWishes::where(['user_id' => $user_id, 'product_id' => $request->product_id])->delete();
        return ResponseHelper::Out('success', $data, 200);
    }

    // Product Cart
    public function CreateCartList(Request $request): JsonResponse
    {
        $user_id = $request->header('id');
        $product_id = $request->input('product_id');
        $color = $request->input('color');
        $size = $request->input('size');
        $qty = $request->input('qty');

        $UnitPrice = 0;

        $productDetails = Products::where('id', '=', $product_id)->first();
        if ($productDetails->discount == 1) {
            $UnitPrice = $productDetails->discount_price;
        } else {
            $UnitPrice = $productDetails->price;
        }
        $totalPrice = $qty * $UnitPrice;

        $data = ProductCart::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $product_id],
            [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'color' => $color,
                'size' => $size,
                'qty' => $qty,
                'price' => $totalPrice
            ]
        );

        return ResponseHelper::Out('success', $data, 200);
    }

    public function CartList(Request $request): JsonResponse
    {
        $user_id = $request->header('id');
        $data = ProductCart::where('user_id', $user_id)->with('product')->get();
        return ResponseHelper::Out('success', $data, 200);
    }

    public function DeleteCartList(Request $request): JsonResponse
    {
        $user_id = $request->header('id');
        $data = ProductCart::where('user_id', '=', $user_id)->where('product_id', '=', $request->product_id)->delete();
        return ResponseHelper::Out('success', $data, 200);
    }
}
