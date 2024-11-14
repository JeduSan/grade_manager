<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\StudentYearLevel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AddStudentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => ['required','string','max:255'],
            'student_fname' => ['required','string','max:255'],
            'student_mname' => ['required','string','max:255'],
            'student_fname' => ['required','string','max:255'],
            'student_email' => ['required','string','lowercase','email','max:255','unique:student,email'],
            'student_course' => ['required','numeric','integer','digits:1'],
            'student_year' => ['required','numeric','integer','digits:1']
        ]);

        try {

            DB::transaction(function () use ($request) {
                $student = Student::create([
                    'id' => $request->student_id,
                    'fname' => $request->student_fname,
                    'mname' => $request->student_mname,
                    'lname' => $request->student_lname,
                    'email' => $request->student_email,
                    'course_id' => $request->student_course
                ]);

                // Get the current academic year based in the current year
                $acad_year = AcademicYear::where(DB::raw('YEAR(start_date)'),DB::raw('YEAR(NOW())'))
                ->select('id')
                ->first();

                StudentYearLevel::create([
                    'student_key' => $student->key,
                    'year_level_id' => $request->student_year,
                    'academic_year_id' =>$acad_year->id
                ]);
            });

            session(['success' => 'Student added successfully!']);

        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.dashboard');
    }
}
