<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManagerUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $admins = User::search($request->search)->where('role_id',1)->get();

        return view('admin.user_manager',[
            'admins' => $admins
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'admin_name' => ['required','string','max:255'],
            'admin_email' => ['required','string','max:255','unique:'.User::class.',email'],
            'admin_password' => ['required',Rules\Password::defaults()],
        ]);

        try {

            User::create([
                'name' => $request->admin_name,
                'email' => $request->admin_email,
                'password' => Hash::make($request->admin_password),
                'role_id' => 1 // admin
            ]);

            session(['success' => 'Admin added successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.user');
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
            'admin_name' => ['required','string','max:255'],
            'admin_email' => ['required','string','max:255'],
            'admin_password' => ['nullable',Rules\Password::defaults()],
        ]);

        try {

            User::find($id)->update([
                'name' => $request->admin_name,
                'email' => $request->admin_email,
                'password' => Hash::make($request->admin_password)
            ]);

            session(['success' => 'Admin edited successfully!']);
        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            User::destroy($id);

            session(['success' => 'User deleted successfully!']);
        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return to_route('admin.manager.user');
    }
}
