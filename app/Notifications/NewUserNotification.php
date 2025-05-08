<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewUserNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Naujas vartotojas užsiregistravo')
                    ->greeting('Sveiki!')
                    ->line('Užsiregistravo naujas vartotojas:')
                    ->line('Vardas: ' . $this->user->name)
                    ->line('El. paštas: ' . $this->user->email)
                    ->line('Dėkojame!');
    }
}
