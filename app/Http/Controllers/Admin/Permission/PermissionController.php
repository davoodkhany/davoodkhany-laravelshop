<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function create(User $user){

        return view('admin.users.permission', compact('user'));
    }

    public function store(Request $request, User $user){


        $data = $request->validate([
            'rules' => 'required|array',
            'permissions' => 'required|array'
        ]);

       

        $user->rules()->sync($data['rules']);

        $user->permissions()->sync($data['permissions']);

        alert()->success('دسترسی مورد نظر با موفقیت ثبت شد.');

        return redirect(route('admin.users.index'));


    }

}

