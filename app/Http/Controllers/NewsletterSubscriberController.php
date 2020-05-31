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
            'email' => 'required|unique:newsletter_subscriber|email'
        ];

        //custom validation error messages.
        $messages = [
            'email.email' => 'Please enter an email address.',
            'email.unique' => 'This email address has already been added to our newsletter.',
        ];

        // validate the request.
        $request->validate($rules, $messages);
    }
}
