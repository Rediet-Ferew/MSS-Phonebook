<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OTPVerificationController extends Controller
{
    public function sendOTP(Request $request)
    {
        $to = $request->input('phonenumber'); //change this with user phone number
        $message = $this->generateOTP();
        $template_id = 'otp'; // Replace with the desired template ID

        $server = 'https://sms.yegara.com/api2/send';
        $username = 'mssethiopia'; // Replace with your Yegara API username
        $password = 'NJd1*51*0fCx#O:];Awx66'; // Replace with your Yegara API password

        $postData = [
            'to' => $to,
            'message' => $message,  // store this in the database
            'template_id' => $template_id,
            'password' => $password,
            'username' => $username,
        ];

        
        $client = new Client();
        $response = $client->post($server, [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => $postData,
        ]);

        if ($response->getStatusCode() === 200){
            return response()->json(['message' => 'OTP sent successfully']);
        } else {
            return response()->json(['message' => 'Failed to send OTP'], 500);
        }

        // Store the OTP in the database or session for later verification
        // You can use $message variable to access the generated OTP
        // return view("otpcheck");
        // return response()->json(['message' => 'OTP sent successfully']);
    }

    public function generateOTP()
{
    // Generate a random six-digit OTP code
    $otp = mt_rand(100000, 999999);
    
    return (string) $otp;
}

public function verifyOTP(Request $request)
{
    $phonenumber = $request->input('phonenumber');
    $enteredOTP = $request->input('otp');
    $storedOTP = $request->input('stored_otp');

    if (!empty($enteredOTP) && !empty($storedOTP) && $enteredOTP === $storedOTP) {
        // OTP verification succeeded
        // Update the OTP verified field in the user's record in the database
        // DB::table('users')->where('phonenumber', $phonenumber)->update(['otp_verified' => true]);

        // Redirect the user to the desired page or perform any other actions
        return response()->json(['message' => 'OTP verification successful']);
    } else {
        // OTP verification failed
        // Handle the failure case (e.g., show an error message)
        return response()->json(['message' => 'OTP verification failed'], 400);
    }
}

public function showOTPForm()
{
    $phonenumber = Session::get('verify_otp_phonenumber');
    $otp = Session::get('verify_otp_otp');

    return view('otpcheck', compact('phonenumber', 'otp'));
}

}