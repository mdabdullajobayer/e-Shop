<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getall(): JsonResponse
    {
        $brand = Brand::all();
        return ResponseHelper::Out('success', $brand, 200);
    }
}
