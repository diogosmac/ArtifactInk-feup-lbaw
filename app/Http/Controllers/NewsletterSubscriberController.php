<?php

namespace App\Http\Controllers;

use App\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    /**
     * Shows logged user personal infomation
     *
     * @return View
     */
    public function subscribe(Request $request) {
        // validate request
        $this->validateSubscription($request);
        
        $subscriber = new NewsletterSubscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return redirect()
            ->intended(route('home'))
            ->with('status','Thanks for subscribing to our newsletter, stay tuned.');
    }

    private function validateSubscription(Request $request) {
        //validation rules.
        $rules = [
            'email' => 'required|email'
        ];

        //custom validation error messages.
        $messages = [
            'email.*' => 'Please enter an email address.',
        ];

        // validate the request.
        $request->validate($rules, $messages);
    }
}
