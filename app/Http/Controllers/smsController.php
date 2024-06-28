<?php

namespace App\Http\Controllers;

use App\Models\User;
use Emanate\BeemSms\Facades\BeemSms;

class smsController extends Controller
{
    public function sendSms()
    {
        BeemSms::content('hello')
            ->loadRecipients(User::all(), 'phone_number')
            ->apiKey(env('BEEM_SMS_API_KEY'))
            ->secretKey(env('BEEM_SMS_SECRET_KEY'))
            ->send();

    }
}
