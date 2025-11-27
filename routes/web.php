<?php

use Illuminate\Support\Facades\Route;

// Non-admin controllers (tetap dipakai)
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;

// Admin controllers (folder admin)
use App\Http\Controllers\admin\adminClassroomController;
use App\Http\Controllers\admin\adminGuardianController;
use App\Http\Controllers\admin\adminStudentController;
use App\Http\Controllers\admin\adminSubjectController;
use App\Http\Controllers\admin\adminTeacherController;

// Models (optional, bisa dipakai di routes closure)
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;

// -----------------------------
// 🏠 Halaman Utama & Profil
// -----------------------------
Route::get('/', [ProfilController::class, 'index'])->name('index');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/kontak', [ProfilController::class, 'kontak'])->name('kontak');
Route::get('/home', [ProfilController::class, 'home'])->name('home');
Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

// -----------------------------
// 🧩 Bagian Admin (pakai controller di folder admin)
// -----------------------------
Route::prefix('admin')->name('admin.')->group(function () {

    // Classroom Routes (Hanya Create/Tambah)
    Route::get('/classroom', [adminClassroomController::class, 'index'])->name('classrooms.index');
    Route::post('/classroom', [adminClassroomController::class, 'store'])->name('classroom.store');

    // Subject Routes (Hanya Create/Tambah)
    Route::get('/subject', [adminSubjectController::class, 'index'])->name('subject.index');
    Route::post('/subject/store', [adminSubjectController::class, 'store'])->name('subject.store');


    // Teacher Routes (CRUD Lengkap)
    Route::get('/teacher', [adminTeacherController::class, 'index'])->name('teachers.index');
    Route::post('/teacher', [adminTeacherController::class, 'store'])->name('teacher.store');
    Route::put('/teacher/{id}', [adminTeacherController::class, 'update'])->name('teacher.update'   );
    Route::delete('/teacher/{id}', [adminTeacherController::class, 'destroy'])->name('teacher.destroy');

    // Guardian Routes (CRUD Lengkap)
    Route::get('/guardian', [adminGuardianController::class, 'index'])->name('guardians.index');
    Route::post('/guardian', [adminGuardianController::class, 'store'])->name('guardian.store');
    Route::put('/guardian/{id}', [adminGuardianController::class, 'update'])->name('guardian.update');
    Route::delete('/guardian/{id}', [adminGuardianController::class, 'destroy'])->name('guardian.destroy');

    // Student Routes (CRUD Lengkap)
    Route::get('/student', [adminStudentController::class, 'index'])->name('students.index');
    Route::post('/student', [adminStudentController::class, 'store'])->name('student.store');
    Route::put('/student/{id}', [adminStudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [adminStudentController::class, 'destroy'])->name('student.destroy');

});