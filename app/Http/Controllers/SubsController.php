<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeEmail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscriptions'
        ]);

        $validator->validateWithBag('subs');

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator, 'subs');
        }

        $subscriber = Subscription::add($request->get('email'));
        $subscriber->generateToken();

        Mail::to($subscriber)->send(new SubscribeEmail($subscriber));

        return redirect()->back()->with('status', 'Please check your email address!');
    }

    public function verify($token)
    {
        $subscriber = Subscription::where('token', $token)->firstOrFail();
        $subscriber->removeToken();
        return redirect('/')->with('status', 'Your email address has been verified, thank you!');
    }
}
