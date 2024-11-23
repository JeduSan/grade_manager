<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Cors;
use App\Http\Middleware\GuestCustom;
use App\Http\Middleware\Student;
use App\Http\Middleware\Teacher;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => Admin::class,
            'teacher' => Teacher::class,
            'cguest' => GuestCustom::class,
            'student' => Student::class,
            'cors' => Cors::class
        ]);

        // REVIEW: normally, requests requires csrf tokens, this removed it for these routes
        // $middleware->validateCsrfTokens(except: [
        //     '/student_login',
        //     '/student/dashboard/data'
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
