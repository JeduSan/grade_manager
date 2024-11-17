<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ManagerSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $subjects = Subject::all();
        // $subjects = DB::table('subject')->paginate(15);
        $subjects = Subject::search($request->search)->get();

        return view('admin.subject_manager',[
            "subjects" => $subjects
        ]);
    }

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

            session(['success' => 'Subject added successfully!']);

        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.subject');
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
