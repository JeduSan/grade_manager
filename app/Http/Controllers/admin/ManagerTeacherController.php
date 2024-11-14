<?php

namespace App\Http\Controllers\admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ManagerTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('admin.teacher_manager',[
            'teachers' => $teachers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => ['required','string','max:255'],
            'teacher_fname' => ['required','string','max:255'],
            'teacher_lname' => ['required','string','max:255']
        ]);


        try {

            Teacher::create([
                'id' => $request->teacher_id,
                'fname' => $request->teacher_fname,
                'lname' => $request->teacher_lname
            ]);

            session(['success' => 'Teacher added successfully!']);

        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.teacher');
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
        $request->validate([
            'teacher_id' => ['required','string','max:255'],
            'teacher_fname' => ['required','string','max:255'],
            'teacher_lname' => ['required','string','max:255']
        ]);

        try {

            Teacher::where('key',$id)->update([
                'id' => $request->teacher_id,
                'fname' => $request->teacher_fname,
                'lname' => $request->teacher_lname
            ]);
            session(['success' => 'Teacher edited successfully!']);

        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::destroy($id);

        return to_route('admin.manager.teacher');
    }
}
