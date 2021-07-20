<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::query();

        if($keyword = $request->search){
            $permissions = Permission::where('label', "LIKE" , "%$keyword%")->orWhere('name', 'LIKE', "%$keyword%");
        }

        $permissions = $permissions->latest()->paginate(10);
        return view('admin.permissions.all', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'label' => 'required|max:255'
        ]);

        Permission::create($data);

        alert()->success('دسترسی مورد نظر با موفقیت اضافه شد.');

        return redirect(route('admin.permission.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {

        $data = $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'label' => 'required|max:255'
        ]);

        $permission->update($data);

        alert()->success('دسترسی مورد نظر با موفقیت ویرایش شد.');
        
        return redirect(route('admin.permission.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back();
    }
}
