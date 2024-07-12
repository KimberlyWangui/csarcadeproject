<?php

namespace App\Services;

use Safaricom\Mpesa\Mpesa;
use Illuminate\Support\Facades\Log;


class MpesaService
{
    protected $mpesa;

    public function __construct()
    {
        $this->mpesa = new Mpesa();
    }

    public function stkPush($phone, $amount, $reference)
    {
        $timestamp = date('YmdHis');
        $businessShortCode = env('MPESA_SHORT_CODE');
        $passkey = env('MPESA_PASSKEY');

        $password = base64_encode($businessShortCode . $passkey . $timestamp);

        $transactionType = 'CustomerPayBillOnline';
        $callbackUrl = env('MPESA_CALLBACK_URL');
        $accountReference = $reference;
        $transactionDesc = 'Payment for tickets';

        $stkPushSimulation = $this->mpesa->STKPushSimulation(
            $businessShortCode,
            $password,
            $timestamp,
            $transactionType,
            $amount,
            $phone,
            $businessShortCode,
            $phone,
            $callbackUrl,
            $accountReference,
            $transactionDesc
        );

        return $stkPushSimulation;
    }
    
}