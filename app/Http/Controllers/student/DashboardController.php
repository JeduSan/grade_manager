<?php

namespace App\Http\Controllers\student;

use App\Models\StudentClass;
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
        // GWA for current sem
        $gwa = 0;
        $total_units = 0;
        $scholarship_type = '';
        $completed_class_no = 0; // no. of subjects that has provided grades (score > 0)
        $pending_class_no = 0; // (score == null)
        $failed_class_no = 0; // (score > 3)
        $inc_class_no = 0; // (score == 0)

        // REVIEW: all grades on all classes and sem
        // [ ] select only the needed
        $subjects = DB::table('student_class')
        ->leftJoin('student_year_level','student_year_level.id','student_class.student_year_level_id')
        ->leftJoin('student','student.key','student_year_level.student_key')
        ->leftJoin('class','class.id','student_class.class_id')
        ->leftJoin('semester','semester.id','class.semester_id')
        ->leftJoin('subject','subject.key','class.subject_key')
        ->where('student.user_id', Auth::user()->id)
        ->whereRaw('DATE(NOW()) BETWEEN semester.start_date AND semester.end_date') // Only get the subjects for current semester
        ->get();

        // GWA FORMULA
        // (grade x units) / total units

        foreach ($subjects as $subject) {
            // compute gwa
            $gwa += (float) $subject->score * (float) $subject->units;
            // sum total units
            $total_units += $subject->units;

            if ($subject->score > 0) {
                $completed_class_no++;
            } else if($subject->score == null) {
                $pending_class_no++;
            } else if($subject->score == 5) {
                $failed_class_no++;
            } else if($subject->score == 0) {
                $inc_class_no++;
            }
        }

        // round to 4 decimal places
        $gwa = round(($gwa/$total_units),4);

        // Get scholar type
        if($gwa >= 1 && $gwa <= 1.3){
            $scholarship_type = 'University Scholar';
        } else if($gwa > 1.3 && $gwa <= 1.5) {
            $scholarship_type = 'Academic Scholar';
        } else if($gwa > 1.5 && $gwa <= 2) {
            $scholarship_type = 'Dean\'s Lister';
        } else {
            $scholarship_type = 'None';
        }

        dd($subjects->all(), $gwa, $scholarship_type, $total_units, $completed_class_no, $pending_class_no, $failed_class_no, $inc_class_no);

        return view('student.dashboard',[
            // 'subjects' => $subjects,
            'gwa' => $gwa,
            'scholarship_type' => $scholarship_type,
            'total_units' => $total_units,
            'grade_status' => [
                'completed' => $completed_class_no,
                'pending' => $pending_class_no,
                'failed' => $failed_class_no,
                'inc' => $inc_class_no
            ]
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
