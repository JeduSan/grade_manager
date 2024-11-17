<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\StudentYearLevel;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class ManagerStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $students = Student::all();
        // $students = DB::table('student')->get();
        $students = Student::search($request->search)
        ->query(function (Builder $builder) {
            $builder->select(
                'student.fname',
                'student.mname',
                'student.lname',
                'student.id',
                'student.email',
                'student_year_level.year_level_id as year',
                'course.abbr as course',
                'student.user_id',
                'student.course_id'
            )
            ->leftJoin('student_year_level','student_year_level.student_key','student.key')
            ->leftJoin('course','course.id','student.course_id');
        })
        ->get();

        $courses = Course::select(
            'id',
            'abbr',
            'description'
        )->get();

        return view('admin.student_manager',[
            "students" => $students,
            "courses" => $courses
        ]);
    }

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
            'student_year' => ['required','numeric','integer','digits:1'],
            'student_password' => ['required',Rules\Password::defaults()]
        ]);

        try {

            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->student_id,
                    'email' => $request->student_email,
                    'password' => Hash::make($request->student_password),
                    'role_id' => 2 // student
                ]);

                $student = Student::create([
                    'id' => $request->student_id,
                    'fname' => $request->student_fname,
                    'mname' => $request->student_mname,
                    'lname' => $request->student_lname,
                    'email' => $request->student_email,
                    'course_id' => $request->student_course,
                    'user_id' => $user->id
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

        return to_route('admin.manager.student');
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
    public function update(Request $request, string $user_id)
    {
        $request->validate([
            'student_id' => ['required','string','max:255'],
            'student_fname' => ['required','string','max:255'],
            'student_mname' => ['required','string','max:255'],
            'student_fname' => ['required','string','max:255'],
            'student_email' => ['required','string','lowercase','email','max:255'],
            'student_course' => ['required','numeric','integer'],
            'student_year' => ['required','numeric','integer'],
            'student_password' => ['nullable',Rules\Password::defaults()]
        ]);

        // dd($request);

        try {

            DB::transaction(function () use ($request,$user_id) {

                $student = Student::where('user_id',$user_id)->first();
                $student->id = $request->student_id;
                $student->fname = $request->student_fname;
                $student->mname = $request->student_mname;
                $student->lname = $request->student_lname;
                $student->email = $request->student_email;
                $student->course_id = $request->student_course;
                $student->save();

                StudentYearLevel::where('student_key',$student->key)->update([
                    'year_level_id' => $request->student_year
                ]);

                User::find($user_id)->update([
                    'name' => $request->student_id,
                    'email' => $request->student_email,
                    'password' => Hash::make($request->student_password)
                ]);

            });

            session(['success' => 'Student edited successfully!']);
        } catch(Exception $e) {
            throw $e;
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {

            User::destroy($id);

            session(['success' => 'Student deleted successfully!']);
        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.student');
    }
}
