<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\CustomerProfile;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function CreateReview(Request $request)
    {
        $user_id = $request->header('id');
        $user = CustomerProfile::where('user_id', $user_id)->first();
        if ($user) {
            $request->merge(['user_id', $user->id]);
            $data = ProductReview::updateOrCreate(
                ['user_id' => $user->id, 'product_id' => $request->input('product_id')],
                $request->input()
            );
            return ResponseHelper::Out('success', $data, 200);
        } else {
            return ResponseHelper::Out('error', 'Customer Profile Not Exits', 401);
        }
    }

    public function ReadReview(Request $request)
    {
        $product_id = $request->input('product_id');
        $data = ProductReview::where('product_id', $product_id)->with(['profile' => function ($qeary) {
            $qeary->select('id', 'name');
        }])->get();
        return ResponseHelper::Out('success', $data, 200);
    }
}
