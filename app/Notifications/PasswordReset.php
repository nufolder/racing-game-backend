<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordReset extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Anda menerima email ini karna akan melakukan reset password !!.')
            ->action('Reset Password', url('password/reset', $this->token))
            ->line('Jika anda merasa tidak mencoba reset password, abaikan email ini.');
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
