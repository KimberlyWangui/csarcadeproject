<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class MpesaService
{
    
    protected $consumerKey;
    protected $consumerSecret;
    protected $shortCode;
    protected $passkey;
    protected $callbackUrl;

    public function __construct()
    {
      
        $this->consumerKey = 'c7pLjZYZ2Yw7rlGLfKQC2J25eq6A9B0jEfAYr3K91oGnNkGY';
        $this->consumerSecret = 'lOMOWCwe5gvzDMTU8TTVtRTcOG6xkWMO24esNAMzABdWAdRspJAqwC4oPW85aDvF';
        $this->shortCode = '174379';
        $this->passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $this->callbackUrl = 'https://a237-105-163-158-193.ngrok-free.app/csarcadeproj';
    }

    public function getAccessToken()
    {
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->get($url);

        if ($response->successful()) {
            return $response->json()['access_token'];
        }

        Log::error('Failed to get M-Pesa access token', ['response' => $response->json()]);
        return null;
    }

    public function stkPush($phone, $amount, $reference)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return ['error' => 'Unable to get access token'];
        }

        $timestamp = date('YmdHis');
        $password = base64_encode($this->shortCode . $this->passkey . $timestamp);

        $url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $response = Http::withToken($accessToken)
            ->post($url, [
                'BusinessShortCode' => $this->shortCode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => $phone,
                'PartyB' => $this->shortCode,
                'PhoneNumber' => $phone,
                'CallBackURL' => $this->callbackUrl,
                'AccountReference' => 'Arcadia',
                'TransactionDesc' => 'Payment for event booking'
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        Log::error('M-Pesa STK Push failed', ['response' => $response->json()]);
        return ['error' => 'Failed to initiate STK Push'];
    }

    public function stkQuery($checkoutRequestId)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return ['error' => 'Unable to get access token'];
        }

        $timestamp = date('YmdHis');
        $password = base64_encode($this->shortCode . $this->passkey . $timestamp);

        $url = "{https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query";
        $response = Http::withToken($accessToken)
            ->post($url, [
                'BusinessShortCode' => $this->shortCode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'CheckoutRequestID' => $checkoutRequestId
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        Log::error('M-Pesa STK Query failed', ['response' => $response->json()]);
        return ['error' => 'Failed to query STK status'];
    }
}