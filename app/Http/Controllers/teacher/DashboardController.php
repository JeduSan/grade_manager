<?php

namespace App\Http\Controllers\teacher;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

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


        // $classes = DB::table('class')->select(
        //     // 'student_class.score',
        //     // 'student_class.id as student_class_id',
        //     'class.id',
        //     'subject.key',
        //     'class.section',
        //     'subject.code as subject_code',
        //     'subject.description as subject_name',
        //     'subject.units as units',
        //     // DB::raw(
        //     //     'COUNT(student_class.score) as ungraded_student_count'
        //     // )
        // )
        // ->leftJoin('teacher','teacher.key','class.teacher_key')
        // ->leftJoin('course','course.id','class.course_id')
        // ->leftJoin('subject','subject.key','class.subject_key')
        // // ->leftJoin('student_class','student_class.class_id','class.id') // used to count the number of students in this class who has been graded (score > 0)
        // ->whereRaw("teacher_key = (SELECT `key` FROM teacher WHERE user_id = " . Auth::user()->id . ")" )
        // ->get();

        $classes = ClassModel::search('')
        ->query(function (Builder $builder) {
            $builder->select(
                    // 'student_class.score',
                    // 'student_class.id as student_class_id',
                    'class.id',
                    'subject.key',
                    'class.section',
                    'subject.code as subject_code',
                    'subject.description as subject_name',
                    'subject.units as units',
                    // DB::raw(
                    //     'COUNT(student_class.score) as ungraded_student_count'
                    // )
                )
                ->leftJoin('teacher','teacher.key','class.teacher_key')
                ->leftJoin('course','course.id','class.course_id')
                ->leftJoin('subject','subject.key','class.subject_key')
                // ->leftJoin('student_class','student_class.class_id','class.id') // used to count the number of students in this class who has been graded (score > 0)
                ->whereRaw("teacher_key = (SELECT `key` FROM teacher WHERE user_id = " . Auth::user()->id . ")" );
                // ->having('student_class.score',0)
                // ->groupBy('class.section','subject.code','subject.description','subject.units','student_class.id','class.id','subject.key');
        })
        ->orderBy('class.id','asc')
        ->get();

        // dd($classes);

        $pending_grades_count = DB::table('student_class')
        ->select(
            'score',
            'class.id as class_id',
            DB::raw('COUNT(*) as count')
        )
        ->leftJoin('class','class.id','student_class.class_id')
        ->leftJoin('teacher','teacher.key','class.teacher_key')
        ->where('teacher.user_id',Auth::user()->id)
        ->havingRaw('score is NULL')
        ->groupBy('class.id','score')
        // ->groupBy('score')
        ->get();
        // dd($pending_grades);

        $mapped = $classes->map(function ($item,$key) use ($pending_grades_count) {
            foreach($pending_grades_count as $pending) {
                if ($pending->class_id == $item->id) {
                    // $item->push(['score' => $pending->score]);
                    // Assign the score from $pending_grades
                    $item->ungraded_count = $pending->count;
                    break; // Exit loop once match is found
                }

            }
            return $item;
        });

        // dd($mapped->all());

        return view('teacher.dashboard',[
            'assigned_subject_count' => $assigned_subject_count,
            'assigned_class_count' => $assigned_class_count,
            'classes' => $mapped,
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
