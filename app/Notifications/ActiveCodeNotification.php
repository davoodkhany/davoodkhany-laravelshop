<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Messages\MailMessage;

class ActiveCodeNotification extends Notification
{
    use Queueable;

    public $code;
    public $phone;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code, $phone)
    {
        $this->code = $code;
        $this->phone = $phone;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
        $api->SendSimple(
            "$this->phone",  // receptor
        "Hello World! . $this->code", // message
        "10008566"    // choose a line number from your account
        );
    }
}
