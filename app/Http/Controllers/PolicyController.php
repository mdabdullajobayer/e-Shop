<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function policy(Request $request)
    {
        $type = $request->input('type');
        $data = Policy::where('type', $type)->first();
        return $data;
    }
}
