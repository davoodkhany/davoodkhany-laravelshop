<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\Admin\CreateUserNotification;
use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    use Notifiable;


    public function index(Request $request)
    {

        $users = User::query();

        if ($keyword = $request->search){

            $users = User::where('email', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%");

        }

        $users = $users->latest()->paginate(2);

        return view('admin.users.all', compact('users'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $password = $request->password;

        $data['password'] = bcrypt($password);

        $user = User::create($data);

        // $user->nofify();

        if($request->has('verify')){
            $user->markEmailAsVerified();
        }

        $user->notify(new CreateUserNotification( $password, $data['email']));

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if( Gate::denies('edit-user', $user)){
            abort(403);
        }

        return view('admin.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)]
        ]);

        if(! is_null($request->password)){

            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $data['password'] = bcrypt($request->password);
        }

         $user->update($data);


        if($request->verify){
            $user->markEmailAsVerified();
        }

        return redirect(route('admin.users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete();

        alert()->success('کابر مورد نظر با موفقیت حذف شد.');

        return back();
    }
}
