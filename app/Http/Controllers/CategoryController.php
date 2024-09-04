<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getall(): JsonResponse
    {
        $category = Category::all();
        return ResponseHelper::Out('success', $category, 200);
    }
}
