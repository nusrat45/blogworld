<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostsController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

//Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminHomeController::class, 'index']);
Route::prefix('')->middleware('auth', 'admin.auth')->group(function() {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index']);
});

Route::resource('users', Admin\AdminController::class);