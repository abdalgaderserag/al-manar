<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($year)
    {
        $user = Auth::getUser();
        if ($user->isTeacher)
            return response('not a student',403);
        $results = $user->results();
        $results = $results->where('year','=',$year);
        return response($results);
    }
}
