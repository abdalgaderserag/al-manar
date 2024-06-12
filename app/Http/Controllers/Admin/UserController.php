<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function teachers()
    {
        $teachers = User::all()->where('subject','!=', '');
        return response($teachers);
    }

    public function students($class)
    {
        $students = User::all()->where('class', '=', $class);
        return response($students);
    }
}
