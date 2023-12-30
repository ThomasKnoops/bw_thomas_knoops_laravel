<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
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
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// auth pages
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/edit-profile', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::post('/follow/{user}', [FollowController::class, 'followUser'])->name('user.follow');
    Route::delete('/unfollow/{user}', [FollowController::class, 'unfollowUser'])->name('user.unfollow');
    Route::post('/comment/create/{news}', [CommentController::class, 'postComment'])->name('comment.post');
});

// Admin pages
Route::middleware(['auth', 'admin'])->group(function () {
    // User management
    Route::put('/user/make-admin/{user}', [UserController::class, 'makeAdmin'])->name('user.makeAdmin');

    // News management
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/create', [NewsController::class, 'store'])->name('news.storeNews');
    Route::get('/news/update/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/delete/{news}', [NewsController::class, 'delete'])->name('news.delete');

    // FAQ management
    Route::get('/faqcat/create', [FaqController::class, 'createCategory'])->name('faq.createCategory');
    Route::post('/faqcat/create', [FaqController::class, 'storeCategory'])->name('faq.storeCategory');
    Route::get('/faqcat/update/{faqcat}', [FaqController::class, 'editCategory'])->name('faq.editCategory');
    Route::put('/faqcat/update/{faqcat}', [FaqController::class, 'updateCategory'])->name('faq.updateCategory');
    Route::delete('/faqcat/delete/{faqcat}', [FaqController::class, 'deleteCategory'])->name('faq.deleteCategory');
    Route::get('/faq/create', [FaqController::class, 'createQuestion'])->name('faq.createQuestion');
    Route::post('/faq/create', [FaqController::class, 'storeQuestion'])->name('faq.storeQuestion');
    Route::get('/faq/update/{faq}', [FaqController::class, 'editQuestion'])->name('faq.editQuestion');
    Route::put('/faq/update/{faq}', [FaqController::class, 'updateQuestion'])->name('faq.updateQuestion');
    Route::delete('/faq/delete/{faq}', [FaqController::class, 'deleteQuestion'])->name('faq.deleteQuestion');

    // Contact management
    Route::get('/contact/admin', [ContactController::class, 'admin'])->name('admin.viewContactForms');
});

// Authentication
Auth::routes();