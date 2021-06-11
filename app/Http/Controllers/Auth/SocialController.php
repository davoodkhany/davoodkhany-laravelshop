<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class SocialController extends Controller
{

    use TowFactorAuthenticate;
    // Google login
    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle(Request $request){

        try {
            $Googleuser=Socialite::driver('google')->user();
            $user=User::where('email',$Googleuser->email)->first();

            if (! $user) {
                $user = User::create([
                    'name' => $Googleuser->name,
                    'email' => $Googleuser->email,
                    'password' => bcrypt(\Str::random(16))
                ]);
                $user->markEmailAsVerified();

                Auth::loginUsingId($user->id);
                return redirect('/');
            }

                $user->markEmailAsVerified();

                Auth::loginUsingId($user->id);

                return $this->logedin($request,$user) ? : redirect('/');



        }
         catch (\Exception $e) {
            alert()->error('ورود با گوگل موفق نبود.', 'شما ارور دارید')->persistent('بسیار خوب');
            return redirect('/login');
        }

    }

    //Google login


    //github login

    public function redirectGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub()
    {

        try {
            $githubuser = Socialite::driver('github')->user();

            $user = User::where('email', $githubuser->email)->first();

            if( $user){
                Auth::loginUsingId($user->id);
                return redirect('/');
            }
            else{

               $newuser =  User::create([
                    'name' => $githubuser->name,
                    'email' => $githubuser->email,
                    'password' => bcrypt(\Str::random(16)),
                ]);

                $newuser->markEmailAsVerified();
                Auth::loginUsingId($newuser->id);
                return redirect('/');

            }
        } catch (\Exception $e) {

            alert()->error('ورود با گوگل موفق نبود.', 'شما ارور دارید')->persistent('بسیار خوب');
            return redirect('/login');
        }

    }

        //Github login

}
