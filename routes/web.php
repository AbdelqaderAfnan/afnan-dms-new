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



Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'] )->name('home');

Auth::routes();

//users routes
Route::get('/profile/{user}',[App\Http\Controllers\UserController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit',[App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}',[App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//documents routes
Route::resource('/document',App\Http\Controllers\DocumentController::class);
Route::resource('cpanel' ,App\Http\Controllers\CpanelController::class );

//Route::get('/folder/branch/{branch_name}', [App\Http\Controllers\FolderController::class, 'branchDoc'])->name('doc_branch');
//Route::post('folder',[App\Http\Controllers\FolderController::class , 'store'])->name('folder.store');
Route::resource('folder' ,App\Http\Controllers\FolderController::class );
Route::get('/folders/branch/{x}' , [App\Http\Controllers\FolderController::class , 'branchDoc'])->where('x', '.*')->name('doc_branch');


