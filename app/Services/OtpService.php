<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OtpService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://sms.yegara.com/api2/',
        ]);
    }

    public function sendOtp($to, $message)
    {
        $username = 'zenachwear';
        $password = 'G43$SGVyu^5SVGC';
        $templateId = 'otp';

        $payload = [
            'username' => $username,
            'password' => $password,
            'to' => $to,
            'message' => $message,
            'template_id' => $templateId,
        ];

        try {
            $response = $this->client->request('POST', 'send', [
                'form_params' => $payload,
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody()->getContents();

            if ($statusCode === 200) {
                return true;
            } else {
                // Handle error response
                // For example:
                // $errorMessage = json_decode($responseBody)->error;
                // Log::error('Failed to send OTP: ' . $errorMessage);
                return false;
            }
        } catch (GuzzleException $e) {
            // Handle exception
            // For example:
            // Log::error('Failed to send OTP: ' . $e->getMessage());
            return false;
        }
    }
}