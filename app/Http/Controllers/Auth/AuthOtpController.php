<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserOtp;

class AuthOtpController extends Controller
{
    //
    public function login(){
        return view('auth.OtpLogin');
    }

    public function generate(Request $request){
        $request->validate([
            'mobile_no'=> 'required|exists:users,mobile_no'
        ]);
        $userOtp = $this->generateOTP($request->mobile_no);
        $userOtp->sendSMS($request->mobile_no); //send otp

        return redirect()->route('otp.verification', ['user_id', $userOtp->user_id])
        ->with('success', 'OTP has been sent on your mobile number!');
    }

    public function generateOTP($mobile_no){
        $user = User::where('mobile_no', $mobile_no)->first();
        $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();
        $now = now();

        if($userOtp && $now->isBefore($userOtp->expire_at)){
            return $userOtp;
        }

        // 1. already available but not expired.
        // 2. already available but expired.
        // 3. not available any otp
 
        return UserOtp::create([
            'user_id'=>$user->id,
            'otp'=> rand('123456', '99999'),
            'expire_at'=> $now->addMinutes(10)
        ]);
    }

    public function verification($user_id){
        return view('auth.otpVerification')->with([
            'user_id'=> $user_id
        ]);
    }
}
