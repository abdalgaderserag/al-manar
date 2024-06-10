<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::getUser();
        if (!$user->isTeacher()){
            $subjects = Subject::all()->where('class', '=', $user['class']);
            $sch[0] = $subjects->where('date','=',today());
            $sch[1] = $subjects->where('date','=',today()->addDay());
            return response($sch);
        }
        return response('unauthorized',403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $subject = new Subject($request->only(['date','link']));
        $subject['teacher_id'] = Auth::id();
        $subject->save();
        return response($subject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $subject->teacher();
        $subject->video();
        return response($subject);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        return response('',404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response(1);
    }
}
