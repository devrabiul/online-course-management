<?php

use App\Http\Controllers\Frontend\FrontendHomeController;
use App\Http\Controllers\Frontend\StudentController;
use App\Http\Controllers\Frontend\CourseController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::controller(FrontendHomeController::class)->group(function() {
    Route::get('/', 'index')->name('frontend.index');
});

Route::controller(StudentController::class)->group(function() {
    Route::get('student-list', 'index')->name('frontend.student-list');
    Route::post('student-add', 'addStudent')->name('frontend.student-add');
    Route::get('student-edit', 'edit')->name('frontend.student-edit');
    Route::post('student-update', 'update')->name('frontend.student-update');
    Route::get('student-delete', 'destroy')->name('frontend.student-delete');
});

Route::controller(CourseController::class)->group(function() {
    Route::get('course-list', 'index')->name('frontend.course-list');
    Route::post('course-add', 'addStudent')->name('frontend.course-add');
    Route::get('course-edit', 'edit')->name('frontend.course-edit');
    Route::post('course-update', 'update')->name('frontend.course-update');
    Route::get('course-delete', 'destroy')->name('frontend.course-delete');
});
