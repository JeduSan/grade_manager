<?php

namespace App\Http\Controllers\admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ManagerStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('admin.student_manager',[
            "students" => $students
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
        $request->validate([
            'student_id' => ['required','string','max:255'],
            'student_fname' => ['required','string','max:255'],
            'student_mname' => ['required','string','max:255'],
            'student_fname' => ['required','string','max:255'],
            'student_email' => ['required','string','lowercase','email','max:255']
        ]);

        try {
            Student::where('key',$id)->update([
                'id' => $request->student_id,
                'fname' => $request->student_fname,
                'mname' => $request->student_mname,
                'lname' => $request->student_lname,
                'email' => $request->student_email
            ]);
            session(['success' => 'Student edited successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::destroy($id);

        return to_route('admin.manager.student');
    }
}
