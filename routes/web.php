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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//users route
Route::get('/profile/{user}',[App\Http\Controllers\UserController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit',[App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}',[App\Http\Controllers\UserController::class, 'update'])->name('profile.update');

Route::resource('/document',App\Http\Controllers\DocumentController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
