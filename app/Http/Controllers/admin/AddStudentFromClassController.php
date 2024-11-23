<?php

namespace App\Http\Controllers\admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentClass;

class AddStudentFromClassController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $class_id)
    {
        $request->validate([
            'year_id' => ['required','numeric','integer']
        ]);

        try {
            StudentClass::create([
                'student_year_level_id' => $request->year_id,
                'class_id' => $class_id,
                // 'score' => 0
            ]);

            session(['success' => 'Student added successfully!']);

        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :( <br><br> - Please make sure the student is not in the list yet.']);
        }

        return redirect("/admin/manager/view/class/$class_id");
    }
}
