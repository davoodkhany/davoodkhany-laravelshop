<?php

use Illuminate\Http\Request;

Route::get('/', function () {

    // auth()->user()->activecode()->create(
    //     [
    //         'code' => 11111,
    //         'expire_at' => now()->addMinutes(10)
    //     ]
    // );

    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



Route::get('auth/token', 'Auth\AuthTokenController@getToken')->name('2fa.token');
Route::post('auth/token', 'Auth\AuthTokenController@postToken');


Route::get('auth/google', 'Auth\SocialController@redirectGoogle')->name('auth.google');

Route::get('auth/google/callback/', 'Auth\SocialController@callbackGoogle');


Route::get('auth/github', 'Auth\SocialController@redirectGithub')->name('auth.git');
Route::get('auth/github/callback/', 'Auth\SocialController@callbackGithub');





Route::middleware('auth')->group(function () {

    Route::get('/profile', 'ProfileController@index');

    Route::get('/profile/twofactor', 'ProfileController@manegeTwoFactor');

    Route::post('/profile/twofactor', 'ProfileController@postManageTwoFactor')->name('posttwofactor');


    Route::get('/profile/twofacor/phoneverify', 'ProfileController@phoneVerify')->name('phoneverify.2f.auth');

    Route::post('/profile/twofacor/phoneverify', 'ProfileController@postVerify');
});



