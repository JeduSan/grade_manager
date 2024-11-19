<?php

namespace App\Http\Controllers\teacher;

use Exception;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function update_password(Request $request, string $user_id) {
        // dd($user_id,$request->all());
        $request->validate([
            'old_password' => ['required', 'current_password',Rules\Password::defaults()],
            'new_password' => ['required','confirmed',Rules\Password::defaults()]
        ]);

        try {
            User::where('id',$user_id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            session(['success' => 'Password updated!']);
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
        try {
            User::destroy($id);
        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('teacher.profile');
    }
}
