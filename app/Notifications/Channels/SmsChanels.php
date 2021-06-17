<?php



namespace App\Notifications\Channels;




use Illuminate\Notifications\Notification;

 use Ghasedak\GhasedakApi;

class SmsChannel {

public function send($notifiable, Notification $notification){

    dd($notifiable);

    // $api = new ghasedakapi(env('GHASEDAKAPI_KEY'));
    // $api->SendSimple(
    // "09199312019",  // receptor
    // "Hello World!", // message
    // "10008566"    // choose a line number from your account
    // );

}

}
