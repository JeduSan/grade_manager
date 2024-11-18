<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher_count = Teacher::count();

        $student_count = Student::count();

        $class_count = ClassModel::count();

        $current_sem = DB::table('semester')
        ->select(
            'semester.number as sem',
            DB::raw('YEAR(academic_year.start_date) as start'),
            DB::raw('YEAR(academic_year.end_date) as end')
        )
        ->leftJoin('academic_year','academic_year.id','semester.academic_year_id')
        ->whereRaw(
            'CURDATE() between semester.start_date and semester.end_date'
        )->first();

        return view('admin.dashboard',[
            'teacher_count' => $teacher_count,
            'student_count' => $student_count,
            'class_count' => $class_count,
            'current_sem' => $current_sem
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
