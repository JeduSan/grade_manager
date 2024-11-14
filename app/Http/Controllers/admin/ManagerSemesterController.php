<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters = Semester::all();

        return view('admin.semester_manager',[
            'sems' => $semesters
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
