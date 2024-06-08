<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\GuestPageController;
use App\Http\Controllers\TeacherPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestPageController::class, 'home'])->name('home');
Route::get('/categorias', [GuestPageController::class, 'subjects'])->name('subjects');
Route::get('/categoria/{subject}', [GuestPageController::class, 'subject'])->name('subject');
Route::get('/profesor/{teacher}', [GuestPageController::class, 'teacher'])->name('teacher');
Route::get('/conviertete-en-profesor', [GuestPageController::class, 'becomeATeacher'])->name('become-a-teacher');
Route::get('/ayuda', [GuestPageController::class, 'help'])->name('help');

Route::middleware(['auth'])->group(function () {
    Route::get('/auth', [TeacherPageController::class, 'auth'])->name('auth');
    Route::get('/panel-de-control', [AdminPageController::class, 'dashboard'])->name('dashboard');
    Route::get('/seguridad', [TeacherPageController::class, 'security'])->name('security');
});