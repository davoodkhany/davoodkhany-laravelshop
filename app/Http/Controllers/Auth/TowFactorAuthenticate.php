<?php

namespace  App\Http\Controllers\Auth;

use App\ActiveCode;
use Illuminate\Http\Request;

trait TowFactorAuthenticate
{

    public function logedin(Request $request,$user){
        if($user->two_factor_auth !== "off"){
            auth()->Logout();

            $request->session()->flash('auth', [
                'user_id' => $user->id,
                'using_sms' => false,
                'remember' => $request->has('remember')
            ]);


            $user->activecode()->delete();
            $code = ActiveCode::generateCode($user);

            // !! TODO Send Sms
            $request->session()->push('auth.using_sms', true);
            if($user->two_factor_auth == 'sms'){

                $user->activecode()->delete();
                $code = ActiveCode::generateCode($user);

                // !! TODO Send Sms
                $request->session()->push('auth.using_sms', true);
            }


            return redirect(route('2fa.token'));

        }

        return false;
    }

}

