<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public static function all()
    {
        $user = User::paginate(10);

        return $user;
    }

    public static function create($request)
    {
        $request_data = $request->all();
        $request_data['password'] = Hash::make($request_data['password']);

        User::create($request_data);
    }

    public static function details($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public static function edit($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public static function update($request, $id)
    {
        $request_data = $request->all();
        $request_data['password'] = Hash::make($request_data['password']);

        $user = User::findOrFail($id);
        $user->update($request_data);
    }
    public static function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->forceDelete();
    }

    public static function block($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    }

    public static function blocked_users()
    {
        return User::onlyTrashed()->get();
    }

    public static function unblock($id)
    {
        return User::withTrashed()->find($id)->restore();
    }
}
