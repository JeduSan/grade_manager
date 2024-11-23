<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Semester;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sems = DB::table('semester')
        ->select(
            'semester.id',
            'semester.number',
            'semester.start_date as start',
            'semester.end_date as end',
            DB::raw('CONCAT(YEAR(academic_year.start_date),"-",YEAR(academic_year.end_date)) as acad_year'),
            DB::raw('YEAR(academic_year.start_date) as acad_start')
        )
        ->leftJoin('academic_year','academic_year.id','semester.academic_year_id')
        // ->where('academic_year.start_date','YEAR(NOW())')
        ->having('acad_start',DB::raw('YEAR(NOW())'))
        ->get();

        // dd($sems);

        return view('admin.settings',[
            'sems' => $sems
        ]);
    }

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

        return to_route('admin.settings');
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
        try {
            Semester::destroy($id);

            session(['success' => 'Semester deleted successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :( <br><br> - Only newly created semesters can be deleted for data integrity reasons.']);
        }

        return to_route('admin.settings');
    }
}
