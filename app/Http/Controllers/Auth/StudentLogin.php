<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class StudentLogin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user_id = Auth::user()->id;

        return response()
        ->json([
            'success' => $user_id
        ],200,headers: [
            "Access-Control-Allow-Origin: *",
            "Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Authorization, Origin",
            "Access-Control-Allow-Methods: POST, PUT"
        ]);

        // return redirect()->intended(route('dashboard', absolute: false));

        // if(Auth::user()->role_id == 1) {
        //     // return redirect()->intended(route('admin.dashboard', absolute: false));
        //     return to_route('admin.dashboard');
        // } else if (Auth::user()->role_id == 3) {
        //     // return redirect()->intended(route('teacher.dashboard', absolute: false));
        //     return to_route('teacher.dashboard');
        // } else if (Auth::user()->role_id == 2) {
        //     // return redirect()->intended(route('teacher.dashboard', absolute: false));
        //     return to_route('student.dashboard');
        // }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
