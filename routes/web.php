<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\DashboardController;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\ProfileController;

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
