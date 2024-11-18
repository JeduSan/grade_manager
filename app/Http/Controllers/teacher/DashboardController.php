<?php

namespace App\Http\Controllers\teacher;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $assigned_class_count = ClassModel::whereRaw("teacher_key = (SELECT `key` FROM teacher WHERE user_id = " . Auth::user()->id . ")" )->count();

        // Count distinct subjects only
        $assigned_subject_count = DB::table('class')
        ->select(DB::raw('COUNT(DISTINCT(subject_key)) as count'))
        ->whereRaw("teacher_key = (SELECT `key` FROM teacher WHERE user_id = " . Auth::user()->id . ")" )
        ->first();

        // Count all classes
        $assigned_class_count = ClassModel::whereRaw("teacher_key = (SELECT `key` FROM teacher WHERE user_id = " . Auth::user()->id . ")" )->count();

        $pending_grades = DB::table('student_class')
        ->select(
            DB::raw('COUNT(score) as count')
        )
        ->leftJoin('class','class.id','student_class.class_id')
        ->leftJoin('teacher','teacher.key','class.teacher_key')
        ->where('teacher.user_id',Auth::user()->id)
        ->where('score',0)
        ->first();

        return view('teacher.dashboard',[
            'assigned_subject_count' => $assigned_subject_count,
            'assigned_class_count' => $assigned_class_count,
            'pending_grades' => $pending_grades
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
