<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // return view('auth.login');
        return view('auth.login_v2');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));

        if(Auth::user()->role_id == 1) {
            // return redirect()->intended(route('admin.dashboard', absolute: false));
            return to_route('admin.dashboard');
        } else if (Auth::user()->role_id == 3) {
            // return redirect()->intended(route('teacher.dashboard', absolute: false));
            return to_route('teacher.dashboard');
        }
        // else if (Auth::user()->role_id == 2) {
        //     // return redirect()->intended(route('teacher.dashboard', absolute: false));
        //     // return to_route('student.dashboard');
        // }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
