<?php

namespace App\Rules;

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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function passes($attribute, $value)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify' , [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
            'response' => $value,
            'remoteip' => request()->ip()
        ]);

        $response->throw();

        $response = $response->json();

        return $response['success'];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'شما به عنوان ربات تشخیص داده شده اید';
    }
}
