<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class AddSubjectController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => ['required','string','max:255'],
            'subject_code' => ['required','string','max:255'],
            'subject_units' => ['required','numeric','integer','unique:subject,code']
        ]);

        try {

            Subject::create([
                'code' => $request->subject_code,
                'description' => $request->subject_name,
                'units' => $request->subject_units
            ]);

            session(['success' => 'Student added successfully!']);

        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.dashboard');
    }
}
