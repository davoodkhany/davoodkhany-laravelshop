<?php

namespace App\Http\Controllers;

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
            if($data['phone'] !== auth()->user()->phone)
            {
                //phone number sotre

                return redirect(route('phoneverify.2f.auth'));
            }
            else{
                $request->user()->update([
                    'tow_factor_auth' => 'sms'
                ]);
            }
        }

        if($data['type'] === 'off' ){

            Auth::user()->update([
                'tow_factor_auth' => 'off'
            ]);
        }

        return back();

    }

    public function phoneVerify(){
        return view('profile.phoneverify');
    }


    public function postVerify(Request $request){
        $request->validate([
            'token' => 'required'
        ]);
    }
}
