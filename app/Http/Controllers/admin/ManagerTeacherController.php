<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Dept;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class ManagerTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $teachers = Teacher::all();
        // $teachers = DB::table('teacher')->paginate(15);
        $teachers  = Teacher::search($request->search)
        ->query(function (Builder $builder) {
            $builder->select(
                'teacher.id',
                'teacher.fname',
                'teacher.lname',
                'users.email',
                'dept.description as dept',
                'teacher.dept_id',
                'teacher.user_id'
            )
            ->leftJoin('dept','dept.id','teacher.dept_id')
            ->leftJoin('users','users.id','teacher.user_id');
        })
        ->get();

        $depts = Dept::all();

        return view('admin.teacher_manager',[
            'teachers' => $teachers,
            'depts' => $depts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => ['required','string','unique:teacher,id','max:255'],
            'teacher_fname' => ['required','string','max:255'],
            'teacher_lname' => ['required','string','max:255'],
            'teacher_email' => ['required','string','max:255','unique:'.User::class.',email'],
            'teacher_password' => ['required',Rules\Password::defaults()]
        ]);

        try {

            DB::transaction(function () use ($request) {

                $user = User::create([
                    'name' => $request->teacher_id,
                    'email' => $request->teacher_email,
                    'password' => Hash::make($request->teacher_password),
                    'role_id' => 3 // teacher
                ]);

                Teacher::create([
                    'id' => $request->teacher_id,
                    'fname' => $request->teacher_fname,
                    'lname' => $request->teacher_lname,
                    // 'email' => $request->teacher_email,
                    'dept_id' => $request->teacher_dept,
                    'user_id' => $user->id
                ]);
            });
            session(['success' => 'Teacher added successfully!']);

        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :( <br><br> - Please make sure that the Teacher ID is not yet taken.']);
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
    public function update(Request $request, string $user_id)
    {
        $request->validate([
            'teacher_id' => ['required','string','unique:teacher,id,'.$request->teacher_id,'max:255'],
            'teacher_fname' => ['required','string','max:255'],
            'teacher_lname' => ['required','string','max:255'],
            'teacher_email' => ['required','string','unique:users,email,'.$user_id,'max:255'],
            'teacher_dept' => ['required','numeric','integer'],
            'teacher_password' => ['nullable',Rules\Password::defaults()]
        ]);

        try {

            DB::transaction(function () use ($request,$user_id) {
                Teacher::where('user_id',$user_id)->update([
                    'id' => $request->teacher_id,
                    'fname' => $request->teacher_fname,
                    'lname' => $request->teacher_lname,
                    // 'email' => $request->teacher_email,
                    'dept_id' => $request->teacher_dept
                ]);

                User::find($user_id)->update([
                    'name' => $request->teacher_id,
                    'email' => $request->teacher_email,
                    'password' => Hash::make($request->teacher_password),
                ]);
            });

            session(['success' => 'Teacher edited successfully!']);

        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :( <br><br> - Please make sure the teacher ID or Email doesn\'t exist yet.']);
        }

        return to_route('admin.manager.teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            User::destroy($id);
            // Teacher::destroy($id);
            session(['success' => 'Teacher deleted successfully!']);

        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }


        return to_route('admin.manager.teacher');
    }
}
