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

// Public pages
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// User pages
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/edit-profile', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
});

// Admin pages
Route::middleware(['auth', 'admin'])->group(function () {
    Route::put('/user/make-admin/{user}', [UserController::class, 'makeAdmin'])->name('user.makeAdmin');
    Route::post('/news/create', [NewsController::class, 'create'])->name('admin.addNews');
    Route::put('/news/update/{news}', [NewsController::class, 'update'])->name('admin.editNews');
    Route::delete('/news/delete/{news}', [NewsController::class, 'delete'])->name('admin.deleteNews');
    Route::post('/faqcat/create', [FaqController::class, 'create'])->name('admin.addFaqCategory');
    Route::put('/faqcat/update/{faqcat}', [FaqController::class, 'update'])->name('admin.editFaqCategory');
    Route::delete('/faqcat/delete/{faqcat}', [FaqController::class, 'delete'])->name('admin.deleteFaqCategory');
    Route::post('/faq/create', [FaqController::class, 'createQuestion'])->name('admin.addFaqQuestion');
    Route::put('/faq/update/{faq}', [FaqController::class, 'updateQuestion'])->name('admin.editFaqQuestion');
    Route::delete('/faq/delete/{faq}', [FaqController::class, 'deleteQuestion'])->name('admin.deleteFaqQuestion');
    Route::get('/contact/admin', [ContactController::class, 'admin'])->name('admin.viewContactForms');
});

Auth::routes();