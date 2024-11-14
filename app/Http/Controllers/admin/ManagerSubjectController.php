<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class ManagerSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('admin.subject_manager',[
            "subjects" => $subjects
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
            'subject_name' => ['required','string','max:255'],
            'subject_code' => ['required','string','max:255'],
            'subject_units' => ['required','numeric','integer']
        ]);

        try {
            Subject::where("key",$id)->update([
                'code' => $request->subject_code,
                'description' => $request->subject_name,
                'units' => $request->subject_units
            ]);

            session(['success' => 'Subject edited successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.subject');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subject::destroy($id);

        return to_route('admin.manager.subject');
    }
}
