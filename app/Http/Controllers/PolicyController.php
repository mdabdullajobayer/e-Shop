<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function PolicybyType()
    {
        return view('pages.policy');
    }
    public function policy(Request $request)
    {
        $type = $request->type;
        $data = Policy::where('type', $type)->first();
        return $data;
    }
}
