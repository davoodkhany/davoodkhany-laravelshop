<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {



            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
                'secret' => '6LfW_CcbAAAAAD4k2WMrLxdRZhPwLqQTskcTHBAJ',
                'response' => $value,
                'remoteip' => request()->ip()
            ]);

            return $response['success'];

            $response->throw();



    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
