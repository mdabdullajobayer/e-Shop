<?php

namespace App\Http\Controllers;

use App\Helpers\JWTToken;
use App\Helpers\ResponseHelper;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function LoginPage()
    {
        return view('pages.login-page');
    }

    public function VerifyPage()
    {
        return view('pages.verify-page');
    }

    public function UserLogin(Request $request)
    {
        try {
            $UserMail =  $request->UserEmail;
            $otp = rand(1000, 5000);
            $details = ['code' => $otp];
            Mail::to($UserMail)->send(new OTPMail($details));
            User::updateOrCreate(['email' => $UserMail], ['email' => $UserMail, 'otp' => $otp]);
            return ResponseHelper::Out('success', 'Please Check Your Mail To Verify Login', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('error', $e, 200);
        }
    }

    public function VerifyLogin(Request $request)
    {
        $UserMail = $request->UserMail;
        $OTP = $request->OTP;

        $varefication = User::where('email', $UserMail)
            ->where('otp', $OTP)->first();
        if ($varefication) {
            User::where('email', $UserMail)->where('otp', $OTP)->update(['otp' => 0]);
            $token = JWTToken::CreateToken($UserMail, $varefication->id);
            return ResponseHelper::Out('success', '', 200)->cookie('token', $token, 60 * 34 * 34);
        } else {
            return ResponseHelper::Out('error', null, 401);
        }
    }

    public function UserLogout()
    {
        return redirect('login')->cookie('token', '', -1);
    }
}
