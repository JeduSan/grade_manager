<?php

use App\Http\Controllers\admin\AddAcademicYearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ManagerUserController;
use App\Http\Controllers\admin\ManagerClassController;
use App\Http\Controllers\admin\StudentExcelController;
use App\Http\Controllers\admin\SubjectExcelController;
use App\Http\Controllers\admin\TeacherExcelController;
use App\Http\Controllers\admin\ManagerStudentController;
use App\Http\Controllers\admin\ManagerSubjectController;
use App\Http\Controllers\admin\ManagerTeacherController;
use App\Http\Controllers\teacher\ViewSubjectsController;
use App\Http\Controllers\admin\ManagerSemesterController;
use App\Http\Controllers\admin\AddStudentFromClassController;
use App\Http\Controllers\admin\RemoveStudentFromClassController;
use App\Http\Controllers\admin\ProfileController as AdminProfileController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\teacher\ProfileController as TeacherProfileController;
use App\Http\Controllers\student\DashboardController as StudentDashboardController;
use App\Http\Controllers\teacher\DashboardController as TeacherDashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/**
 * =============================================
 * My Routes
 * =============================================
 *
 * //[ ] Add middlewares
 */

// TEMP LANDING PAGE
Route::get('/', function () {
    // return view('landing');
    // REVIEW: Our landing page will be the login page
    return to_route('login');
})->middleware(['cguest'])->name('home');

// ==========
// ADMIN SIDE
// ==========
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Route::post('/admin/dashboard/add/teacher',[AddTeacherController::class,'store'])->name('admin.dashboard.add.teacher');
    // Route::post('/admin/dashboard/add/student',[AddStudentController::class,'store'])->name('admin.dashboard.add.student');
    // Route::post('/admin/dashboard/add/subject',[AddSubjectController::class,'store'])->name('admin.dashboard.add.subject');
    // Route::post('/admin/dashboard/add/semester',[AddSemesterController::class,'store'])->name('admin.dashboard.add.semester');

    // DEPRECATED
    // Route::get('/admin/manager',[ManagerController::class,'index'])->name('admin.manager');

    // TEACHER MANAGER
    Route::get('/admin/manager/teacher', [ManagerTeacherController::class, 'index'])->name('admin.manager.teacher');
    Route::post('/admin/manager/add/teacher', [ManagerTeacherController::class, 'store'])->name('admin.manager.add.teacher');
    Route::post('/admin/manager/add/teacher/excel', [TeacherExcelController::class, 'store'])->name('admin.manager.add.teacher.excel');
    Route::delete('/admin/manager/delete/teacher/{id}', [ManagerTeacherController::class, 'destroy'])->name('admin.manager.delete.teacher');
    Route::patch('/admin/manager/edit/teacher/{user_id}', [ManagerTeacherController::class, 'update'])->name('admin.manager.edit.teacher');

    // STUDENT MANAGER
    Route::get('/admin/manager/student', [ManagerStudentController::class, 'index'])->name('admin.manager.student');
    Route::post('/admin/manager/add/student', [ManagerStudentController::class, 'store'])->name('admin.manager.add.student');
    Route::post('/admin/manager/add/student/excel', [StudentExcelController::class, 'store'])->name('admin.manager.add.student.excel');
    Route::delete('/admin/manager/delete/student/{id}', [ManagerStudentController::class, 'destroy'])->name('admin.manager.delete.student');
    Route::patch('/admin/manager/edit/student/{user_id}', [ManagerStudentController::class, 'update'])->name('admin.manager.edit.student');

    // SEMESTER MANAGER
    // Route::get('/admin/manager/semester', [ManagerSemesterController::class, 'index'])->name('admin.manager.semester');
    // Route::post('/admin/manager/add/semester', [ManagerSemesterController::class, 'store'])->name('admin.manager.add.semester');
    // Route::get('/admin/manager/delete/semester/{id}', [ManagerSemesterController::class, 'destroy'])->name('admin.manager.delete.semester');
    // Route::patch('/admin/manager/edit/semester/{id}', [ManagerSemesterController::class, 'update'])->name('admin.manager.edit.semester');

    // SUBJECT MANAGER
    Route::get('/admin/manager/subject', [ManagerSubjectController::class, 'index'])->name('admin.manager.subject');
    Route::post('/admin/manager/add/subject', [ManagerSubjectController::class, 'store'])->name('admin.manager.add.subject');
    Route::post('/admin/manager/add/subject/excel', [SubjectExcelController::class, 'store'])->name('admin.manager.add.subject.excel');
    Route::delete('/admin/manager/delete/subject/{id}', [ManagerSubjectController::class, 'destroy'])->name('admin.manager.delete.subject');
    Route::patch('/admin/manager/edit/subject/{id}', [ManagerSubjectController::class, 'update'])->name('admin.manager.edit.subject');

    // CLASS MANAGER
    Route::get('/admin/manager/class', [ManagerClassController::class, 'index'])->name('admin.manager.class');
    Route::post('/admin/manager/add/class', [ManagerClassController::class, 'store'])->name('admin.manager.add.class');
    Route::patch('/admin/manager/edit/class/{id}', [ManagerClassController::class, 'update'])->name('admin.manager.edit.class');
    Route::delete('/admin/manager/delete/class/{id}', [ManagerClassController::class, 'destroy'])->name('admin.manager.delete.class');
    Route::get('/admin/manager/view/class/{id}', [ManagerClassController::class, 'show'])->name('admin.manager.show.class');
    // CLASS MANAGER > VIEW CLASS
    Route::get('/admin/manager/view/class/remove/student/{student_class_id}/{class_id}', [RemoveStudentFromClassController::class, 'destroy'])->name('admin.manager.view.class.remove.student');
    Route::post('/admin/manager/view/class/add/student/{class_id}', [AddStudentFromClassController::class, 'store'])->name('admin.manager.view.class.add.student');

    // USER MANAGER
    Route::get('/admin/manager/user', [ManagerUserController::class, 'index'])->name('admin.manager.user');
    Route::post('/admin/manager/add/user', [ManagerUserController::class, 'store'])->name('admin.manager.add.user');
    Route::patch('/admin/manager/edit/user/{id}', [ManagerUserController::class, 'update'])->name('admin.manager.edit.user');
    Route::delete('/admin/manager/delete/user/{id}', [ManagerUserController::class, 'destroy'])->name('admin.manager.delete.user');

    // PROFILE
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');

    // SETTINGS
    Route::get('/admin/settings',[SettingsController::class,'index'])->name('admin.settings');
    Route::post('/admin/settings/add/sem',[SettingsController::class,'store'])->name('admin.settings.add.sem');
    Route::delete('/admin/settings/delete/sem/{id}',[SettingsController::class,'destroy'])->name('admin.settings.destroy.sem');

    Route::post('/admin/settings/add/academic_year',AddAcademicYearController::class)->name('admin.settings.add.academic_year');

});

// ============
// TEACHER SIDE
// ============
Route::middleware(['auth','verified','teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');

    Route::get('/teacher/view/subjects', [ViewSubjectsController::class, 'index'])->name('teacher.view.subjects');
    Route::get('/teacher/view/subjects/class_list/{class_id}', [ViewSubjectsController::class, 'show']);
    Route::patch('/teacher/view/subjects/class_list/grading/{student_class_id}/{class_id}', [ViewSubjectsController::class, 'update']);

    // PROFILE
    Route::get('/teacher/profile', [TeacherProfileController::class, 'index'])->name('teacher.profile');
    Route::patch('/teacher/profile/update/{user_id}', [TeacherProfileController::class, 'update'])->name('teachers.profile.update');
    Route::patch('/teacher/profile/update/password/{user_id}', [TeacherProfileController::class, 'update_password'])->name('teachers.profile.update');
    Route::delete('/teacher/profile/deactivate/{user_id}', [TeacherProfileController::class, 'destroy'])->name('teachers.profile.deactivate');
});


// ============
// STUDENT SIDE
// ============
// Route::middleware(['auth','verified','student'])->group(function () {
    // Route::get('/student/dashboard/data', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    // Route::get('/student/view/grades', [StudentDashboardController::class, 'index'])->name('student.dashboard');
// });
