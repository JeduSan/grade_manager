<?php

namespace App\Http\Controllers\teacher;

use Exception;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = DB::table('users')
        ->leftJoin('teacher','teacher.user_id','users.id')
        ->where('users.id',Auth::user()->id)
        ->first();

        return view('teacher.profile',[
            'user' => $user
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
    public function update(Request $request, string $user_id)
    {
        $request->validate([
            'teacher_fname' => ['required','string','max:255'],
            'teacher_lname' => ['required','string','max:255'],
            'teacher_email' => ['required','string','email' ,'max:255']
        ]);

        // dd($user_id,$request);
        try {

            DB::transaction(function () use ($user_id,$request) {
                Teacher::where('user_id',$user_id)->update([
                    'fname' => $request->teacher_fname,
                    'lname' => $request->teacher_lname,
                    'email' => $request->teacher_email
                ]);

                User::where('id',$user_id)->update([
                    'email' => $request->teacher_email
                ]);
            });
            session(['success' => 'Profile edited successfully!']);
        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('teacher.profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
