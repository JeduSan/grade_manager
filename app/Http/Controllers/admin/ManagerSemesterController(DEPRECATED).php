<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Semester;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ManagerSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $semesters = Semester::all();
        $semesters = DB::table('semester')->paginate(15);

        // Get the current academic year based in the current year
        $acad_year = AcademicYear::where(DB::raw('YEAR(start_date)'),DB::raw('YEAR(NOW())'))
        ->first();

        return view('admin.semester_manager',[
            'sems' => $semesters,
            'acad_year' => $acad_year
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

        return to_route('admin.manager.semester');
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
            // NOTE: Deleting a sem affiliated to a class throws an error since sem is a foreign key in class
            Semester::destroy($id);
            session(['success' => 'Semester deleted successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong, please make sure this semester record is not assigned to any class :(']);
        }


        return to_route('admin.manager.semester');
    }
}
