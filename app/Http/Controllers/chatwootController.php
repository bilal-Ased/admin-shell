<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class chatwootController extends Controller
{
    public function getResponse(Request $request)
    {
        // $username = '4fda9408af0df31f';
        // $password = 'NzM4OTlhNTUwZWYxZmEzMmFkMmI2YzVmMjExNmFlMDU0NGFjODZjZWE2ZjExMzU2ZTA0MmY2YzYyMmUxNTU5MA==';

        // $URL = 'https://dlrapi.beem.africa/public/v1/delivery-reports';

        // $dest_addr = '254797686905';
        // $request_id = 'beem';
        // $body = ['request_id' => $request_id, 'dest_addr' => $dest_addr];

        // // Setup cURL
        // $ch = curl_init();
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);

        // $URL = $URL.'?'.http_build_query($body);

        // curl_setopt($ch, CURLOPT_URL, $URL);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt_array($ch, [
        //     CURLOPT_HTTPGET => true,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_HTTPHEADER => [
        //         'Authorization:Basic '.base64_encode("$username:$password"),
        //         'Content-Type: application/json',
        //     ],
        // ]);

        // // Send the request
        // $response = curl_exec($ch);

        // // Check for errors
        // if ($response === false) {
        //     echo $response;

        //     exit(curl_error($ch));
        // }
        // var_dump($response);

        $smsHandler = new SMS([
            'api_key' => '4fda9408af0df31f',
            'secret_key' => 'NzM4OTlhNTUwZWYxZmEzMmFkMmI2YzVmMjExNmFlMDU0NGFjODZjZWE2ZjExMzU2ZTA0MmY2YzYyMmUxNTU5MA',
        ]);
        // Setup the transaction
        $data = [
            'source_addr' => 'INFO',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => 'Hello World',
            'recipients' => [['recipient_id' => '1', 'dest_addr' => '254797686905'],
            ]];

        // Execute
        $result = $smsHandler->send($data);

        // Print results
        var_dump($result);
        // $payload = $request->all();
        // Log::info('Webhook Payload: '.json_encode($payload));

        // // Respond with a success message
        // return response()->json(['message' => 'Webhook processed successfully']);
    }
}
