<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Customer;
use App\Models\CustomerProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile');
    }
    public function CreateUser(Request $request)
    {
        try {
            $user_id = $request->header('id');
            $request->merge(['user_id' => $user_id]);
            $data = CustomerProfile::updateOrCreate(
                ['user_id' => $user_id],
                $request->input()
            );
            return ResponseHelper::Out('success', $data, 200);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    public function ReadProfile(Request $request)
    {
        $userId = $request->header('id');
        $data = CustomerProfile::where('user_id', $userId)->first();
        return ResponseHelper::Out('success', $data, 200);
    }
}
