<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\BidangKeahlianController;
use App\Http\Controllers\TahunLulusController;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\KonsentrasiKeahlianController;
use App\Http\Controllers\StatusAlumniController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\TracerKuliahController;
use App\Http\Controllers\TracerKerjaController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Public testimoni routes
Route::get('/testimoni/public', [TestimoniController::class, 'indexUser'])->name('testimoni.indexuser');
Route::get('/testimoni/public/create', [TestimoniController::class, 'createUser'])->name('testimoni.createuser');
Route::post('/testimoni/public', [TestimoniController::class, 'storeUser'])->name('testimoni.storeuser');

// Authentication required routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/{id}', 'show')->name('profile.show');
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // User routes with explicit naming
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/edit', 'edit')->name('user.edit');
        Route::post('/user/update', 'update')->name('user.update');
    });

    // Tracer study routes
    Route::controller(TracerKuliahController::class)->group(function () {
        Route::get('/tracer-kuliah', 'index')->name('tracer_kuliah.index');
        Route::get('/tracer-kuliah/questionnaire', 'showQuestionnaire')->name('tracer_kuliah.questionnaire');
        Route::post('/tracer-kuliah/questionnaire', 'submitQuestionnaire')->name('tracer_kuliah.submit-questionnaire');
    });

    Route::controller(TracerKerjaController::class)->group(function () {
        Route::get('/tracer-kerja', 'index')->name('tracer_kerja.index');
        Route::get('/tracer-kerja/questionnaire', 'showQuestionnaire')->name('tracer_kerja.questionnaire');
        Route::post('/tracer-kerja/questionnaire', 'submitQuestionnaire')->name('tracer_kerja.submit-questionnaire');
    });

    // Testimoni routes for authenticated users

    // Resource routes
    Route::resources([
        'alumni' => AlumniController::class,
        'status_alumni' => StatusAlumniController::class,
        'konsentrasi_keahlian' => KonsentrasiKeahlianController::class,
        'program_keahlian' => ProgramKeahlianController::class,
        'tahun_lulus' => TahunLulusController::class,
        'bidang_keahlian' => BidangKeahlianController::class,
        'sekolah' => SekolahController::class,
        'users' => UserController::class,
        'testimoni' => TestimoniController::class,
        'user_testimoni' => UserTestimoniController::class, // Changed URI to avoid collision
        'tracer_kuliah' => TracerKuliahController::class,
        'tracer_kerja' => TracerKerjaController::class,
    ]);
    
    // Admin routes
    Route::middleware(['role:admin'])->group(function() {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });
    
});

require __DIR__.'/auth.php';