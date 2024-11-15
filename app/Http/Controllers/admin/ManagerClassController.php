<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Semester;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;

class ManagerClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();

        $subjects = Subject::all();

        $courses = Course::all();

        // $semesters = Semester::all();

        $semesters = DB::table('semester')
        ->select(
            'semester.id',
            'semester.number',
            DB::raw('YEAR(academic_year.start_date) as start_year'),
            DB::raw('YEAR(academic_year.end_date) as end_year')
        )
        ->leftJoin('academic_year','semester.academic_year_id','academic_year.id')
        ->get();

        return view('admin.class_manager',[
            'teachers' => $teachers,
            'subjects' => $subjects,
            'courses' => $courses,
            'semesters' => $semesters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'instructor' => ['required','integer','numeric'],
            'subject' => ['required','integer','numeric'],
            'course' => ['required','integer','numeric'],
            'year' => ['required','integer','numeric'],
            'semester' => ['required','integer','numeric'],
            'section' => ['required','string','max:255']
        ]);

        try {
            ClassModel::create([
            'subject_key' => $request->subject,
            'section' => $request->section,
            'course_id' => $request->course,
            'year_level_id' => $request->year,
            'semester_id' => $request->semester,
            'teacher_key' => $request->instructor
            ]);
            session(['success' => 'Class added successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.class');
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
