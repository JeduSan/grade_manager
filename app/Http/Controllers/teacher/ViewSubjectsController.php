<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ViewSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $classes = DB::table('class')
        // ->select(
        //     'class.section',
        //     'subject.code as subject_code',
        //     'subject.description as subject_name',
        //     'subject.units as units',
        //     DB::raw(
        //         'COUNT(student_class.score) as ungraded_student_count'
        //     )
        // )
        // ->leftJoin('subject','subject.key','class.subject_key')
        // ->leftJoin('student_class','student_class.class_id','class.id') // used to count the number of students in this class who has been graded (score > 0)
        // ->whereRaw(
        //     "teacher_key = (SELECT `key` FROM teacher WHERE user_id = " . Auth::user()->id . ")"
        // )
        // ->groupBy('class.section','subject.code','subject.description','subject.units')
        // ->get();

        // REVIEW: The left join of teacher and course is not needed, but due to the constraints of the ClassModel
        // toSearchableArray, it has to be included
        $classes = ClassModel::search($request->search)
        ->query(function (Builder $builder) {
            $builder->select(
                    'student_class.id as student_class_id',
                    'class.id',
                    'subject.key',
                    'class.section',
                    'subject.code as subject_code',
                    'subject.description as subject_name',
                    'subject.units as units',
                    DB::raw(
                        'COUNT(student_class.score) as ungraded_student_count'
                    )
                )
                ->leftJoin('teacher','teacher.key','class.teacher_key')
                ->leftJoin('course','course.id','class.course_id')
                ->leftJoin('subject','subject.key','class.subject_key')
                ->leftJoin('student_class','student_class.class_id','class.id') // used to count the number of students in this class who has been graded (score > 0)
                ->whereRaw("teacher_key = (SELECT `key` FROM teacher WHERE user_id = " . Auth::user()->id . ")" )
                ->groupBy('class.section','subject.code','subject.description','subject.units','student_class.id','class.id','subject.key');
        })
        ->orderBy('class.id','asc')
        ->get();



        return view('teacher.view-subjects',[
            'classes' => $classes
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
