<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/edit-profile', [UserController::class, 'editProfile'])->name('user.editProfile');
Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
Route::put('/user/make-admin/{user}', [UserController::class, 'makeAdmin'])->name('user.makeAdmin');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Auth::routes();