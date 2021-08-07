<?php

use App\Comment;
use App\Permission;
use App\Product;
use App\Rule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {

    $product = Product::find('2');

    // return get_class($product);


    // $product->comments()->create([

    //     'user_id' => auth()->user()->id ,
    //     'comment' => "this is a comment morteza bajelan" ,
    // ]);
    // auth()->user()->comments()->create([

    //     'comment' =>"this is a comment daood" ,
    //     'commentable_id' => $product->id,
    //     'commentable_type' => get_class($product)
    // ]);

$comment = Comment::find(1);
    return $comment->commentable;

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


Route::get('products', 'ProductController@index');
Route::get('products/{product}', 'ProductController@show');


// Route::get('test', function () {

//     $string = Str::of('my name is davood')->slug('-');
// return $string;

// });


