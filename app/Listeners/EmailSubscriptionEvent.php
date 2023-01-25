<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\UserSubscribedMessage;
use App\Models\User;
use App\Services\UserService;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;

class EmailSubscriptionEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {

        $user = UserService::getUserByIp();

        if ($user) {
            if ($user->name == null) {
                $data['name'] = $event->name;
            }

            if ($user->email == null) {
                $data['email'] = $event->email;
            }

            if (count($data) > 0) {
                User::find($user->id)->update($data);
            }
        }

        Mail::to($event->email)->send(new UserSubscribedMessage($event->name, $event->email));
    }
}
