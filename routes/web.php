<?php

use App\Permission;
use App\Rule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {

    // if(Gate::allows('delete-user')){
    //     return redirect(route('admin.'));
    // }

    // return 'no';
        // auth()->loginUsingId(1);
        // return 'yes';
    // $rules = Rule::find(1);
    // return $rules->permissions;

    Auth::loginUsingid(28);
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


Route::get('test', function () {

    $string = Str::of('my name is davood')->slug('-');
return $string;

});


