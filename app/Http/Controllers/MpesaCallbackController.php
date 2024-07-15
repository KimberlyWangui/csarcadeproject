<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;

class MpesaCallbackController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('M-Pesa Callback received', $request->all());

        $callbackData = $request->json()->all();

        if (isset($callbackData['Body']['stkCallback']['ResultCode']) && $callbackData['Body']['stkCallback']['ResultCode'] == 0) {
            $this->handleSuccessfulPayment($callbackData);
        } else {
            $this->handleFailedPayment($callbackData);
        }

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Success']);
    }

    private function handleSuccessfulPayment($callbackData)
    {
        $transactionId = $callbackData['Body']['stkCallback']['CheckoutRequestID'];
        $amount = $callbackData['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
        $mpesaReceiptNumber = $callbackData['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
        $transactionDate = $callbackData['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
        $phoneNumber = $callbackData['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
    

    
        Payment::updateOrCreate(
            ['transaction_id' => $transactionId],
            [
       
                'amount' => $amount,
                'status' => 'completed',
                'mpesa_receipt_number' => $mpesaReceiptNumber,
                'transaction_date' => $transactionDate,
                'phone_number' => $phoneNumber
            ]
        );
    
        Log::info('Payment successful', compact('transactionId', 'amount', 'mpesaReceiptNumber', 'transactionDate', 'phoneNumber'));
    }

    private function handleFailedPayment($callbackData)
    {
        $transactionId = $callbackData['Body']['stkCallback']['CheckoutRequestID'];
        $resultCode = $callbackData['Body']['stkCallback']['ResultCode'];
        $resultDesc = $callbackData['Body']['stkCallback']['ResultDesc'];

        Payment::updateOrCreate(
            ['transaction_id' => $transactionId],
            [
                'status' => 'failed',
                'failure_reason' => $resultDesc
            ]
        );

        Log::error('Payment failed', compact('transactionId', 'resultCode', 'resultDesc'));
    }
}