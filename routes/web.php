<?php

use App\Http\Controllers\Backend\AdvisedController as BackendAdvisedController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\CourseController;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\BatchController;
use App\Http\Controllers\BackEnd\AdvisedController;
use App\Http\Controllers\BackEnd\ProfileController;
use App\Http\Controllers\BackEnd\DashboardController;
use App\Http\Controllers\BackEnd\DepartmentController;
use App\Http\Controllers\BackEnd\SemesterController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', [DashboardController::class,'index'])->name('dashboard');

    /* *************** Role *************** */
    Route::resource('roles',RoleController::class);

    /* *************** User *************** */
    Route::resource('users', UserController::class);

    /* *************** Profile *************** */
    Route::get('profile',[ProfileController::class,'index'])->name('profile');
    Route::get('password',[ProfileController::class,'password'])->name('password');
    Route::post('posfile-update',[ProfileController::class,'update'])->name('profile_update');
    Route::post('password-update',[ProfileController::class,'passwordUpdate'])->name('password_update');

    // /* *************** Course *************** */
    // Route::get('course-list',[CourseController::class,'index'])->name('course.index');
    // Route::get('course-create',[CourseController::class,'create'])->name('course.create');
    // Route::post('course-store',[CourseController::class,'store'])->name('course.store');

    Route::resource('courses',CourseController::class);

    /* *************** Department *************** */
    Route::resource('departments',DepartmentController::class);

    /* *************** Batch *************** */
    Route::resource('batchs',BatchController::class);

    /* *************** Advising *************** */
    Route::resource('advised',AdvisedController::class);

    Route::resource('semesters',SemesterController::class);

});
