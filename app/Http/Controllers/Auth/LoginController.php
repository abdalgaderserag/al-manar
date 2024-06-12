<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::all()->where('username','=', $request['username'])->first();
        if (!empty($user)){
            if (Hash::check($request['password'],$user['password'])){
                Auth::login($user);
                $user['token'] = $user->createToken($user->username.'-token')->palinTextToken;
                return response($user);
            }
            return response('wrong password',401);
        }
        return response('user is not registered',401);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response('logged out');
    }
}
