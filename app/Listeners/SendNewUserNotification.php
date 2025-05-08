<?php

namespace App\Listeners;

use App\Notifications\NewUserNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
{
    public function handle(Registered $event): void
    {
        Notification::route('mail', 'igkristupas@gmail.com')
            ->notify(new NewUserNotification($event->user));
    }
}
