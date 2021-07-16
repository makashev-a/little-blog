<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{slug}', [HomeController::class, 'show'])->name('post.show');
Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('tag.show');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category.show');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'registerForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'store']);
});



Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function() {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'PostsController');
});

