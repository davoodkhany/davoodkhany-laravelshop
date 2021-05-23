<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {

    alert()->success('welome','message');
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



Route::get('auth/google', 'Auth\SocialController@redirectGoogle')->name('auth.google');

Route::get('auth/google/callback/', 'Auth\SocialController@callbackGoogle');

Route::get('auth/github', 'Auth\SocialController@redirectGithub')->name('auth.git');
Route::get('auth/github/callback/', 'Auth\SocialController@callbackGithub');



// Route::get('test', function (){

//     dd('test');


// })->middleware(['auth', 'password.confirm']);


Route::get('profile', 'ProfileController@index');

Route::get('profile/twofactor', 'ProfileController@manegeTwoFactor');

Route::post('profile/twofactor', 'ProfileController@postManageTwoFactor')->name('posttwofactor');

