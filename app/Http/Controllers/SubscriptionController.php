<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionThankYou;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        // Save the email to your subscribers table
        Subscriber::create([
            'email' => $request->input('email'),
        ]);

        // Send a thank-you email
        Mail::to($request->input('email'))->send(new SubscriptionThankYou());

        // Redirect back or to a thank-you page
        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }

}
