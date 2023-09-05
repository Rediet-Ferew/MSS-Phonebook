<?php

namespace App\Http\Controllers;

use Chapa\Chapa\Chapa;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller

{

    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();

    }
    public function initializePayment(Request $request)

    {
        
        $reference = $this->reference;
        $package = $request->input('package');
        $packageModel = Package::where('name', $package)->first();
        
        $amount = $packageModel->package_price;
        
        $user = Auth::user();
        $name = $user->name;
        
        
      
        $email = $user->email;// Replace with the customer's email
        $first_name = $name; // You can modify this according to your needs
        $last_name = '';
        // Gather customer information from the request
        $data = [
            
            'amount' => $amount,
            'email' => $email,
            'tx_ref' => $reference,
            'currency' => "ETB",
            'callback_url' => route('callback',[$reference]),
            'first_name' =>$first_name,
            'last_name' => $last_name,
            "customization" => [
                "title" => "",
                "description" => "I amma testing this"
            ]
        ];


        // Send POST request to initialize the transaction
        $response = Http::withHeaders([
            'Authorization' => 'Bearer CHASECK_TEST-oMrZ54ff1LEOdojZLFIZ9LtHaGYckeu6',
        ])->post('https://api.chapa.co/v1/transaction/initialize', $data) -> json();
        // dd($response);

        // Extract the payment link from the response
        // $checkoutUrl = $response->json();

        // Redirect the user to the payment link
        if ($response['data']['checkout_url']) {
            return redirect($response['data']['checkout_url']);
        } 
    }

    


    public function callback($reference)
    {
        $data = Chapa::verifyTransaction($reference);
        
    
        // If payment is successful
        if ($data['status'] == 'success') {
            // Perform necessary actions for successful payment
            ;
        } else {
            // Oops! Something went wrong with the payment
        }
    
        // Return a JSON response
        return new JsonResponse(['status' => 'success'], JsonResponse::HTTP_OK);
    }
}