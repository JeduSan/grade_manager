<?php

namespace App\Http\Controllers\admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class AddTeacherController extends Controller
{
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

        return to_route('admin.dashboard');
    }
}
