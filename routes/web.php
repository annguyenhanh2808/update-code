<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IdeaDetailController;
use App\Http\Controllers\DashboardController;

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

//Route::get('/', [HomeController::class, 'index'])->name('welcome');

Auth::routes();
Route::get('/', function () {
//        return redirect()->route('login');
    return redirect()->route('ideas.index');
});
Route::middleware(['auth'])->group(function () {

    Route::resource('ideas', IdeaController::class);
    Route::resource('comments', CommentController::class);
    Route::get('/ideas/like/{id}', [IdeaDetailController::class, 'like'])->name('like');
    Route::get('/ideas/dislike/{id}', [IdeaDetailController::class, 'dislike'])->name('dislike');
    Route::get('/ideas/dislike/{id}', [IdeaDetailController::class, 'dislike'])->name('dislike');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/ideaPopular', [IdeaController::class, 'indexPopular'])->name('ideas.popular');
    Route::get('/ideaLastest', [IdeaController::class, 'indexLastest'])->name('ideas.lastest');
    Route::get('/ideaLastestComment', [IdeaController::class, 'indexComments'])->name('ideas.comments');
    Route::get('/export', [IdeaController::class, 'export'])->name('ideas.export');
    Route::get('/download', [IdeaController::class, 'downloadZip'])->name('ideas.download');
});

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/history', [HomeController::class, 'history'])->name('user.history');
    Route::post('/profile/update', [HomeController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/apply/{jobId}', [HomeController::class, 'apply'])->name('apply');
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

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/adminManager/home', [HomeController::class, 'adminManager'])->name('manager.home');

});
