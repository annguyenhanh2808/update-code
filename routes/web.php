<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Job2Controller;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home2', [HomeController::class, 'index'])->name('home2');
Route::get('/job-list/{categoryId?}', [HomeController::class, 'jobList'])->name('job-list');
Route::get('/job-detail/{id}', [HomeController::class, 'jobDetail'])->name('job-detail');
Route::get('/home', [HomeController::class, 'index'])->name('home');
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {


});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('job', JobController::class)->except([
        'create', 'store'
    ]);
    Route::get('/job/{id}/duyet', [JobController::class, 'duyet'])->name('job.duyet');
    Route::get('/job/{id}/tuchoi', [JobController::class, 'tuChoi'])->name('job.tuChoi');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/adminManager/home', [HomeController::class, 'adminManager'])->name('manager.home');
    Route::resource('job2', Job2Controller::class);
});
