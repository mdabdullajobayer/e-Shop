<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\ProductDetails;
use App\Models\ProductReview;
use App\Models\Products;
use App\Models\ProductSlider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ListProductbyCategory(Request $request): JsonResponse
    {
        $data = Products::where('category_id', $request->input('id'))
            ->with('brand', 'category')
            ->get();
        return ResponseHelper::Out('sucess', $data, 200);
    }

    public function ListProductbyRemark(Request $request): JsonResponse
    {
        $data = Products::where('remark', $request->input('remark'))
            ->with('brand', 'category')
            ->get();
        return ResponseHelper::Out('sucess', $data, 200);
    }

    public function ListProductbyBrand(Request $request): JsonResponse
    {
        $data = Products::where('brand_id', $request->input('brand_id'))
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
}
