<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/profile', [UserController::class, 'index'])->name('user.index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Auth::routes();