<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// testing routes
Route::get('/user/{id}', function ($id) {
    \Illuminate\Support\Facades\Auth::logout();
    \Illuminate\Support\Facades\Auth::loginUsingId($id);
    $user = \Illuminate\Support\Facades\Auth::user();
    $user['token'] = $user->createToken($user->name. '-token')->plainTextToken;
    return $user;
});
Route::get('/log',function (){
    return \Illuminate\Support\Facades\Auth::user();
})->middleware('auth:sanctum');


//
Route::middleware('auth:sanctum')->namespace('App\Http\Controllers')->group(function (){
    Route::apiResource('video','VideoController');
    Route::apiResource('subject','SubjectController');
    Route::get('logout','Auth\LoginController@logout')->name('logout');
    Route::put('user/update','Auth\UserController@updateUser')->name('user.update');
});

// guest user
Route::middleware('guest')->namespace('App\Http\Controllers')->group(function (){
    Route::post('login','Auth\LoginController@login')->name('login');
});


// admin panel routes
Route::middleware('auth:sanctum')->namespace('App\Http\Controllers')->group(function (){
    Route::get('test',function (){
        return response('yes');
    });
    Route::post('register','Auth\UserController@register')->name('register');
    Route::put('user/edit/{user}','Auth\UserController@editUser')->name('user.edit');
    Route::delete('user/delete/{user}','Auth\UserController@deleteUser')->name('user.delete');
    Route::namespace('Admin')->prefix('admin')->group(function (){
        Route::apiResource('results','ResultController');
    });
});
