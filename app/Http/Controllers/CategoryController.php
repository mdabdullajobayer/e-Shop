<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function ByCategory(): View
    {
        return view('pages.Productsbycategory');
    }

    public function getall(): JsonResponse
    {
        $category = Category::all();
        return ResponseHelper::Out('success', $category, 200);
    }
}
