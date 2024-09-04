<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Customer;
use App\Models\CustomerProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function CreateUser(Request $request)
    {
        $userId = $request->header('id');
        // dd($userId);
        // exit;
        $request->merge(['user_id', $userId]);
        $data = CustomerProfile::updateOrCreate(
            ['user_id' => $userId],
            $request->input()
        );
        return ResponseHelper::Out('success', $data, 200);
    }

    public function ReadProfile(Request $request)
    {
        $userId = $request->header('id');
        $data = CustomerProfile::where('user_id', $userId)->first();
        return ResponseHelper::Out('success', $data, 200);
    }
}
