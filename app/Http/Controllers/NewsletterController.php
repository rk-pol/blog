<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Http\Requests\EmailSubscriptionRequest;;

class NewsletterController extends Controller
{
    public function subscribe(EmailSubscriptionRequest $request)
    {
        event(new UserSubscribed($request->input('name'), $request->input('email')));

        return back();
    }
}
