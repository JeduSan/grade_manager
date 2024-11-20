<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Semester;
use App\Models\ClassModel;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ManagerClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teachers = Teacher::all();

        $subjects = Subject::all();

        $courses = Course::all();

        $semesters = DB::table('semester')
        ->select(
            'semester.id',
            'semester.number',
            DB::raw('YEAR(academic_year.start_date) as start_year'),
            DB::raw('YEAR(academic_year.end_date) as end_year')
        )
        ->leftJoin('academic_year','semester.academic_year_id','academic_year.id')
        ->get();

        $classes = ClassModel::search($request->search)
        ->query(function (Builder $builder) {

            $builder->select(
            DB::raw('CONCAT(teacher.lname, ", ", teacher.fname) AS "teacher"'),
            'class.id',
            'subject.key as subject_key',
            'subject.description',
            'course.id as course_id',
            'course.abbr as course',
            'class.year_level_id as year',
            'class.section',
            'teacher.key as teacher_key',
            'semester.id as sem_id'
            )
            ->leftJoin('subject','subject.key','class.subject_key')
            ->leftJoin('course','course.id','class.course_id')
            ->leftJoin('semester','semester.id','class.semester_id')
            ->leftJoin('teacher','teacher.key','class.teacher_key')
            ->orderBy('class.course_id');

        })->get();

        return view('admin.class_manager',[
            'teachers' => $teachers,
            'subjects' => $subjects,
            'courses' => $courses,
            'semesters' => $semesters,
            'classes' => $classes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'instructor' => ['nullable','integer','numeric'],
            'subject' => ['required','integer','numeric'],
            'course' => ['required','integer','numeric'],
            'year' => ['required','integer','numeric'],
            'semester' => ['required','integer','numeric'],
            'section' => ['nullable','string','max:255']
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
    public function show(Request $request,string $id)
    {
        $class = DB::table('class')
        ->leftJoin('teacher','teacher.key','class.teacher_key')
        ->leftJoin('subject','subject.key','class.subject_key')
        ->select(
            'class.id',
            DB::raw('CONCAT(teacher.fname," ",teacher.lname) as teacher'),
            'subject.description as subject',
            'subject.units'
        )
        ->where('class.id',$id)
        ->first();

        // $students = DB::table('student_class')
        // ->select(
        //     'student_class.id',
        //     DB::raw('CONCAT(student.fname," ",student.mname," ",student.lname) as name'),
        //     'student.id as student_id',
        //     'course.abbr as course',
        //     'student_year_level.year_level_id as year'
        // )
        // ->leftJoin('student_year_level','student_year_level.id','student_class.student_year_level_id')
        // ->leftJoin('student','student_year_level.student_key','student.key')
        // ->leftJoin('course','course.id','student.course_id')
        // ->where('student_class.class_id',$id)
        // ->get();

        $students = StudentClass::search($request->search_all_students)
        ->query(function (Builder $builder) use ($id) {
            $builder->select(
                'student_class.id',
                DB::raw('CONCAT(student.fname," ",student.mname," ",student.lname) as name'),
                'student.id as student_id',
                'course.abbr as course',
                'student_year_level.year_level_id as year'
            )
            ->leftJoin('student_year_level','student_year_level.id','student_class.student_year_level_id')
            ->leftJoin('student','student_year_level.student_key','student.key')
            ->leftJoin('course','course.id','student.course_id')
            ->where('student_class.class_id',$id);
        })->get();

        $all_students = Student::search($request->search)
        ->query(function (Builder $builder) {
            $builder->select(
                    DB::raw('CONCAT(student.fname," ",student.mname," ",student.lname) as name'),
                    'student_year_level.id as year'
                )
                ->leftJoin('course','course.id','student.course_id')
                ->leftJoin('student_year_level','student_year_level.student_key','student.key');
        })
        ->get();

        return view('admin.class_view',[
            'class' => $class,
            'students' => $students,
            'all_students' => $all_students
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'instructor' => ['nullable','integer','numeric'],
            'subject' => ['required','integer','numeric'],
            'course' => ['required','integer','numeric'],
            'year' => ['required','integer','numeric'],
            'semester' => ['required','integer','numeric'],
            'section' => ['nullable','string','max:255']
        ]);

        try {
            ClassModel::where('id',$id)->update([
                'teacher_key' => $request->instructor,
                'subject_key' => $request->subject,
                'course_id' => $request->course,
                'year_level_id' => $request->year,
                'semester_id' => $request->semester,
                'section' => $request->section
            ]);

            session(['success' => 'Class updated!']);
        } catch (Exception $e) {
            // throw $e;
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.class');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            ClassModel::destroy($id);
            session(['success' => 'Class deleted successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.class');
    }
}
