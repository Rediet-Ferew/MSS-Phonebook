<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\OTPVerificationController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phonenumber' => ['required'],
            
        ]);
    }
        public function register(Request $request)
        {
            $this->validator($request->all())->validate();

        // Generate OTP
            $otpVerificationController = new OTPVerificationController();
            $otp = $otpVerificationController->generateOTP();
            // dd($otp);
            // Create a new user instance
            $user = $this->create($request->all(), $otp);
            DB::table('users')->where('phonenumber', $request->input('phonenumber'))->update(['otp' => $otp]);

            // dd($request);
            // Send OTP and store it in the database
            $otpVerificationController->sendOTP($request);
            Session::put('verify_otp_phonenumber', $request->input('phonenumber'));
            Session::put('verify_otp_otp', $otp);
            
            // return view('otpcheck');tp_
            // Redirect the user to OTP verification page or perform any other actions
            return redirect()->route('verify-otp');
        }

        protected function create(array $data, $otp)
        {

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phonenumber' => $data['phonenumber'],
                'otp' => $otp,
            ]);
        }

        
   
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
   
}
