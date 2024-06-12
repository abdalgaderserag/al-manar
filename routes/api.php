<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function () {
    \Illuminate\Support\Facades\Auth::logout();
    \Illuminate\Support\Facades\Auth::loginUsingId(2);
    $user = \Illuminate\Support\Facades\Auth::user();
    $user['token'] = $user->createToken($user->name. '-token')->plainTextToken;
    return $user;
});


Route::middleware('auth:sanctum')->namespace('App\Http\Controllers')->group(function (){
    Route::apiResource('video','VideoController');
});
