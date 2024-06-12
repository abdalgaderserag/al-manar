<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        return response($user);
    }

    public function updateUser(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user['password'] = Hash::make($request['password']);
        if ($user->isTeacher())
            $user['contact'] = $request['contact'];
        $user->update();
        return response($user);
    }

    public function editUser(EditUserRequest $request, User $user)
    {
        $user->update($request->all());
        return response($user);
    }

    public function deleteUser(User $user)
    {
        if (Auth::user()->isAdmin()){
            $user->delete();
            return response($user);
        }
//        TODO : change error message
        return  response('404',404);
    }
}
