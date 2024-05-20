<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsappController extends Controller
{
    public function getResponse(Request $request)
    {

        $data = $request->all();

        Log::info('All Request', $data);

        // if (isset($data['messages']) && is_array($data['messages'])) {
        //     foreach ($data['messages'] as $message) {
        //         Log::info('whatsApp Message'.$message['text']);

        //     }

        // }

    }
}
