<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function create(){
        return view('admin.users.permission')
    }

    public function store(){

    }

}

