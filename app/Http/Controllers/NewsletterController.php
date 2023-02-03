<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Http\Requests\EmailSubscriptionRequest;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    /**
     * @param EmailSubscriptionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(EmailSubscriptionRequest $request): RedirectResponse
    {
        event(new UserSubscribed($request->input('name'), $request->input('email')));

        return back();
    }
}
