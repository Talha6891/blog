<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
//site controllers
use App\Http\Controllers\Site\HomeController;


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


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//web middleware

//home controller post
Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index');
    Route::get('post/{slug}','singlePost')->name('post');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//admin routes
Route::group([
    ['prefix' => 'admin'],
    ['middleware' => 'auth', 'verified', 'role:admin|writer']
    ], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
//    users
    Route::resource('users', UserController::class);
//    categories
    Route::resource('categories', CategoryController::class);
//    posts
    Route::resource('posts', PostController::class);
//    tags
    Route::resource('tags', TagController::class);
});
