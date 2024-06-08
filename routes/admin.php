<?php

use App\Http\Controllers\AdminPageController;
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

Route::get('/panel-de-control', [AdminPageController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/materias', [AdminPageController::class, 'subjects'])->name('admin.subjects');
Route::get('/profesores-particulares', [AdminPageController::class, 'teachers'])->name('admin.teachers');
Route::get('/valoraciones', [AdminPageController::class, 'reviews'])->name('admin.reviews');
Route::get('/provincias', [AdminPageController::class, 'regions'])->name('admin.regions');
Route::get('/configuracion', [AdminPageController::class, 'settings'])->name('admin.settings');
