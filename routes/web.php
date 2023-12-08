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
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// User pages
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/edit-profile', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
});

// Admin pages
Route::middleware(['auth', 'admin'])->group(function () {
    Route::put('/user/make-admin/{user}', [UserController::class, 'makeAdmin'])->name('user.makeAdmin');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/create', [NewsController::class, 'store'])->name('news.storeNews');
    Route::get('/news/update/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/delete/{news}', [NewsController::class, 'delete'])->name('news.delete');
    Route::get('/faqcat/create', [FaqController::class, 'create'])->name('faq.createCategory');
    Route::post('/faqcat/create', [FaqController::class, 'store'])->name('faq.storeCategory');
    Route::put('/faqcat/update/{faqcat}', [FaqController::class, 'update'])->name('faq.editCategory');
    Route::delete('/faqcat/delete/{faqcat}', [FaqController::class, 'delete'])->name('faq.deleteCategory');
    Route::get('/faq/create', [FaqController::class, 'createQuestion'])->name('faq.createQuestion');
    Route::post('/faq/create', [FaqController::class, 'storeQuestion'])->name('faq.storeQuestion');
    Route::put('/faq/update/{faq}', [FaqController::class, 'updateQuestion'])->name('faq.editQuestion');
    Route::delete('/faq/delete/{faq}', [FaqController::class, 'deleteQuestion'])->name('faq.deleteQuestion');
    Route::get('/contact/admin', [ContactController::class, 'admin'])->name('admin.viewContactForms');
});

Auth::routes();