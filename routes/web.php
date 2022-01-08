<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PensumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}/grades', [CourseController::class, 'grades'])->name('courses.grades');
Route::get('courses/{course}/attendances', [CourseController::class, 'attendances'])->name('courses.attendances');
Route::get('courses/{course}/pensum', [CourseController::class, 'pensum'])->name('courses.pensum');

Route::get('pensums', [PensumController::class, 'index'])->name('pensums.index');
Route::get('pensums/{pensum}', [PensumController::class, 'show'])->name('pensums.show');

Route::get('events', [EventController::class, 'index'])->name('events.index');

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */
