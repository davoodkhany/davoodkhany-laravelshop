<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class SocialController extends Controller
{

    // Google login
    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle(){

        try {
            $Googleuser=Socialite::driver('google')->user();
            $user=User::where('email',$Googleuser->email)->first();
            if($user){

               Auth::loginUsingId($user->id);
               return redirect('/');

            }else{

                $newuser=User::create([
                    'name' => $Googleuser->name,
                    'email' => $Googleuser->email,
                    'password' => bcrypt(\Str::random(16))
                ]);
                Auth::loginUsingId($user->id);
                return redirect('/');
            }
        }
         catch (\Exception $e) {
            return $e;
        }

    }

    //Google login


    //github login

    public function redirectGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub()
    {

        $githubuser = Socialite::driver('github')->user();

        $user = User::where('email', $githubuser->email)->first();

        if($user){
            Auth::loginUsingId($user->id);
            return redirect('/');
        }
        else{

           $newuser =  User::create([
                'name' => $githubuser->name,
                'email' => $githubuser->email,
                'password' => bcrypt(\Str::random(16)),
            ]);

            Auth::loginUsingId($newuser->id);
            return redirect('/');
        }

    }

        //Github login

}
