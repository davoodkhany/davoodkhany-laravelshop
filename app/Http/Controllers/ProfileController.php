<?php

namespace App\Http\Controllers;

use App\ActiveCode;
use App\Notifications\ActiveCodeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function manegeTwoFactor(){
        return view('profile.maneger-two-factor');
    }

    public function postManageTwoFactor(Request $request){

        $data = $request->validate([
            'type' => 'required|in:off,sms',
            'phone' => 'required_unless:type,off'
        ]);



        if($data['type'] === 'sms'){

            // validation phone number

            //create code number
            $code = ActiveCode::generateCode($request->user());

            $request->user()->notify(new ActiveCodeNotification($code,$data['phone']));

            if($data['phone'] !== auth()->user()->phone)
            {
                $request->session()->flash('phone', $data['phone']);

                return redirect(route('phoneverify.2f.auth'));
            }

            else{

                $request->user()->update([
                    'tow_factor_auth' => 'sms'
                ]);
            }

        }

        if($data['type'] === 'off'){

            Auth::user()->update([
                'tow_factor_auth' => 'off'
            ]);
        }

        return back();

    }

    public function phoneVerify(Request $request){

        if( !$request->session()->has('phone')){
            return redirect(route('phoneverify.2f.auth'));
        }

        $request->session()->reflash('phone');


        return view('profile.phoneverify');
    }


    public function postVerify(Request $request){
        $request->validate([
            'token' => 'required'
        ]);

        if(!$request->session()->has('phone')){
            return redirect(route('phoneverify.2f.auth'));
        }



        $status = ActiveCode::verifyCode($request->token, $request->user());


        if($status){

            $request->user()->activecode()->delete();
            $request->user()->update([
                'phone' => $request->session()->get('phone'),
                'tow_factor_auth' => 'sms'
            ]);
            alert()->success('شماره تلفن شما با موفقیت احراز هویت شد.');
        }else{
            alert()->success('شماره تلفن شما احراز هویت نشد.');
        }

    return redirect('/home');



    }
}
