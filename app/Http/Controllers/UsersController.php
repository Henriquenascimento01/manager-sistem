<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $this->authorize('is_admin');

        $users = UserRepository::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $this->authorize('is_admin');

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {   
        $this->authorize('is_admin');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        UserRepository::create($request);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {   
        $this->authorize('is_admin');

        $user =  UserRepository::details($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {  
         $this->authorize('is_admin');

        $user = UserRepository::edit($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {   
        $this->authorize('is_admin');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed'
        ]);

        UserRepository::update($request, $id);

        return redirect('users')->with('flash_message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {   
        $this->authorize('is_admin');

        UserRepository::destroy($id);

        return redirect('users')->with('flash_message', 'User deleted!');
    }

    public function block(User $user)
    {  
        $this->authorize('is_admin');

        UserRepository::block($user->id);

        return back();
    }

    public function blocked_users()
    {
        $this->authorize('is_admin');

        $users = UserRepository::blocked_users();

        return view('users.blocked', compact('users'));
    }

    public function unblock_user(User $user)
    {
        $this->authorize('is_admin');

        UserRepository::unblock($user->id);

        // return view('users.index');
    }
}
