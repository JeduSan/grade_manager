<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\StudentClass;
use Exception;
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

        $pending_grades = DB::table('student_class')
        ->select(
            'score',
            'class.id as class_id',
            DB::raw('COUNT(score) as count')
        )
        ->leftJoin('class','class.id','student_class.class_id')
        ->leftJoin('teacher','teacher.key','class.teacher_key')
        ->where('teacher.user_id',Auth::user()->id)
        ->having('score',0)
        ->groupBy('class.id','score')
        // ->groupBy('score')
        ->get();
        // dd($pending_grades);

        $mapped = $classes->map(function ($item,$key) use ($pending_grades) {
            foreach($pending_grades as $pending) {
                if ($pending->class_id == $item->id) {
                    // $item->push(['score' => $pending->score]);
                    // Assign the score from $pending_grades
                    $item->ungraded_count = $pending->count;
                    break; // Exit loop once match is found
                }

            }
            return $item;
        });

        // dd($mapped->all(),$classes);

        return view('teacher.view-subjects',[
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
    public function show(Request $request,string $class_id)
    {

        $students = StudentClass::search($request->search)
        ->query(function (Builder $builder) use ($class_id) {
            $builder->select(
                'student_class.id',
                'course.id as course_id',
                'student_year_level.id as year_level_id',
                'student.id as student_id',
                DB::raw('CONCAT(student.fname," ",student.mname," ",student.lname) as name'),
                'course.abbr as course',
                'student_year_level.year_level_id as year',
                'student_class.score'
            )
            ->leftJoin('student_year_level','student_year_level.id','student_class.student_year_level_id')
            ->leftJoin('student','student.key','student_year_level.student_key')
            ->leftJoin('course','course.id','student.course_id')
            ->where('student_class.class_id',$class_id);
        })
        ->get();

        // dd($students);

        return view('teacher.class_list',[
            'class_id' => $class_id,
            'students' => $students
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $student_class_id,string $class_id)
    {
        $request->validate([
            'grade' => ['required','numeric']
        ]);

        try {
            StudentClass::where('id',$student_class_id)->update([
                'score' => $request->grade
            ]);
            session(['success' => 'Student graded successfully!']);
        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return redirect('/teacher/view/subjects/class_list/'.$class_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
