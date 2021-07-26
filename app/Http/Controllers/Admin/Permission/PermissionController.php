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



        $user->rules()->sync($request->rules);

        $user->permissions()->sync($request->permissions);

        alert()->success('دسترسی مورد نظر با موفقیت ثبت شد.');

        return redirect(route('admin.users.index'));


    }

}

