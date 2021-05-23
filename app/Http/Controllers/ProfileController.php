<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return $data;

    }

}
