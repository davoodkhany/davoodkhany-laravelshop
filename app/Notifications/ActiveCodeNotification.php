<?php

namespace App\Notifications;

use App\Notifications\Channels\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
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
    public function __construct($code,$phone)
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
        return [SmsChannel::class];
    }

        public function toGahsedakChannels($notifiable){
            return [
                'text' => 'hi'. $this->code,
                'phone' => $this->phone
             ];
        }

}
