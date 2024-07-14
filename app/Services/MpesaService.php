<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class MpesaService
{
    protected $consumerKey;
    protected $consumerSecret;
    protected $shortCode;
    protected $passkey;
    protected $callbackUrl;

    protected $httpClient;

    public function __construct()
    {
        $this->consumerKey = 'c7pLjZYZ2Yw7rlGLfKQC2J25eq6A9B0jEfAYr3K91oGnNkGY';
        $this->consumerSecret = 'lOMOWCwe5gvzDMTU8TTVtRTcOG6xkWMO24esNAMzABdWAdRspJAqwC4oPW85aDvF';
        $this->shortCode = '174379';
        $this->passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $this->callbackUrl = 'https://a237-105-163-158-193.ngrok-free.app/csarcadeproj';

        // Initialize Guzzle HTTP client
        $this->httpClient = new Client([
            'verify' => storage_path('cacert.pem'), // Ensure cacert.pem path is correct
        ]);
    }

    public function getAccessToken()
    {
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        try {
            $response = $this->httpClient->request('GET', $url, [
                'auth' => [$this->consumerKey, $this->consumerSecret],
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['access_token'] ?? null;
        } catch (RequestException $e) {
            Log::error('Failed to get M-Pesa access token', ['error' => $e->getMessage()]);
            return null;
        }
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

        try {
            $response = $this->httpClient->request('POST', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
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
                    'TransactionDesc' => 'Payment for event booking',
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            Log::error('M-Pesa STK Push failed', ['error' => $e->getMessage()]);
            return ['error' => 'Failed to initiate STK Push'];
        }
    }

    public function stkQuery($checkoutRequestId)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return ['error' => 'Unable to get access token'];
        }

        $timestamp = date('YmdHis');
        $password = base64_encode($this->shortCode . $this->passkey . $timestamp);

        $url = "https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query";

        try {
            $response = $this->httpClient->request('POST', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'BusinessShortCode' => $this->shortCode,
                    'Password' => $password,
                    'Timestamp' => $timestamp,
                    'CheckoutRequestID' => $checkoutRequestId,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            Log::error('M-Pesa STK Query failed', ['error' => $e->getMessage()]);
            return ['error' => 'Failed to query STK status'];
        }
    }
}
