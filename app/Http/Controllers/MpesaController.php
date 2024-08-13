<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    private function generateAccessToken()
    {
        $client = new Client();
        $response = $client->request('GET','https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials',['auth'=>[env('MPESA_CONSUMER_KEY'),env('MPESA_CONSUMER_SECRET')]]);
        $body = json_decode($response->getBody()->getContents());
        return $body->access_token;        
    }


    public function initiateStkPush(Request $request)
    {
        $client = new Client();

        $accessToken = 'b1UzJDJKctdMErfsTYAGIpooQj8J'; // Obtain this from the Authorization API
    
        $requestData = [
            'BusinessShortCode' => '174379',
            'Password' => base64_encode('174379' . 'your_passkey' . date('YmdHis')),
            'Timestamp' => date('YmdHis'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $request->input('amount'),
            'PartyA' => $request->input('partyA'),
            'PartyB' => '174379',
            'PhoneNumber' => $request->input('phoneNumber'),
            'CallBackURL' => 'https://yourdomain.com/path',
            'AccountReference' => $request->input('accountReference'),
            'TransactionDesc' => $request->input('transactionDesc'),
        ];
    
        try {
            $response = $client->post('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => $requestData,
            ]);
    
            $body = $response->getBody();
            $data = json_decode($body, true);
    
            // Log or process response
            Log::info('STK Push Response:', $data);
    
            return response()->json($data);
    
        } catch (RequestException $e) {
            Log::error('STK Push Error:', ['message' => $e->getMessage(), 'response' => $e->getResponse()->getBody()->getContents()]);
            return response()->json(['error' => 'Request failed'], 400);
        }
    }



    public function mpesaCallback(Request $request)
    {
        $callbackData = $request->all();

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Success']);
    }
}
