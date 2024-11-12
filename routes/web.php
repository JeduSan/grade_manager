<?php

use App\Http\Controllers\admin\AddSemesterController;
use App\Http\Controllers\admin\AddStudentController;
use App\Http\Controllers\admin\AddSubjectController;
use App\Http\Controllers\admin\AddTeacherController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ManagerController;
use App\Http\Controllers\admin\ManagerTeacherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/**
 * =============================================
 * My Routes
 * =============================================
 *
 * //[ ] Add middlewares
 */

Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
Route::post('/admin/dashboard/add/teacher',[AddTeacherController::class,'store'])->name('admin.dashboard.add.teacher');
Route::post('/admin/dashboard/add/student',[AddStudentController::class,'store'])->name('admin.dashboard.add.student');
Route::post('/admin/dashboard/add/subject',[AddSubjectController::class,'store'])->name('admin.dashboard.add.subject');
Route::post('/admin/dashboard/add/semester',[AddSemesterController::class,'store'])->name('admin.dashboard.add.semester');

Route::get('/admin/manager',[ManagerController::class,'index'])->name('admin.manager');
Route::get('/admin/manager/delete/teacher/{id}',[ManagerTeacherController::class,'destroy'])->name('admin.manager.delete.teacher');
Route::patch('/admin/manager/edit/teacher/{id}',[ManagerTeacherController::class,'update'])->name('admin.manager.edit.teacher');
