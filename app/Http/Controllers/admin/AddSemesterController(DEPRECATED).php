<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Semester;

class AddSemesterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'semester' => ['required','numeric','integer','digits:1'],
            'semester_start' => ['required','date'],
            'semester_end' => ['required','date']
        ]);

        try {

            // Get the current academic year based in the current year
            $acad_year = AcademicYear::where(DB::raw('YEAR(start_date)'),DB::raw('YEAR(NOW())'))
            ->select('id')
            ->first();

            Semester::create([
                'academic_year_id' => $acad_year->id,
                'number' => $request->semester,
                'start_date' => $request->semester_start,
                'end_date' => $request->semester_end
            ]);

            session(['success' => 'Semester added successfully!']);

        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.dashboard');
    }
}
