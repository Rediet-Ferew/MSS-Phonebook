<?php

namespace App\Http\Controllers;

use Chapa\Chapa\Chapa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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
        // Gather customer information from the request
        $data = [
            
            'amount' => 100,
            'email' => 'redietasnakech@gmail.com',
            'tx_ref' => $reference,
            'currency' => "ETB",
            'callback_url' => route('callback',[$reference]),
            'first_name' => "Rediet",
            'last_name' => "Ferew",
            "customization" => [
                "title" => "",
                "description" => "I amma testing this"
            ]
        ];


        // Send POST request to initialize the transaction
        $response = Http::withHeaders([
            'Authorization' => 'Bearer CHASECK_TEST-VzfEzr2QYvpPo1FUE3VVwgHa3rNezcvs',
        ])->post('https://api.chapa.co/v1/transaction/initialize', $data) -> json();
        // dd($response);

        // Extract the payment link from the response
        // $checkoutUrl = $response->json();

        // Redirect the user to the payment link
        return redirect($response['data']['checkout_url']);
    }

    


    public function callback($reference)
    {
        $data = Chapa::verifyTransaction($reference);
        dd($data);
    
        // If payment is successful
        if ($data['status'] == 'success') {
            // Perform necessary actions for successful payment
            dd($data);
        } else {
            // Oops! Something went wrong with the payment
        }
    
        // Return a JSON response
        return new JsonResponse(['status' => 'success'], JsonResponse::HTTP_OK);
    }
}