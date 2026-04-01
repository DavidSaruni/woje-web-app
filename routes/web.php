<?php

use App\Http\Controllers\WebController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PosterController;
use Illuminate\Support\Facades\Route;

// Web Routes
Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/news', [WebController::class, 'news'])->name('news');
// newsReadMore
Route::get('/news/{slug}/',[WebController::class,'newsReadMore'])->name('news.newsReadMore');
Route::post('/contact', [WebController::class, 'submitContact'])->name('contact.submit');
Route::get('/board', [WebController::class, 'board'])->name('board');
Route::get('/courses', [WebController::class, 'courses'])->name('courses');
Route::get('/courses/{slug}', [WebController::class, 'showCourse'])->name('courses.readmore');

// Default login route for Laravel auth middleware
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Admin Auth Routes (Public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('news', NewsController::class)->names([
        'index' => 'news.index',
        'create' => 'news.create',
        'store' => 'news.store',
        'edit' => 'news.edit',
        'update' => 'news.update',
        'destroy' => 'news.destroy'
    ]);
    
    Route::resource('contact', \App\Http\Controllers\Admin\ContactController::class)->names([
        'index' => 'contact.index',
        'show' => 'contact.show',
        'edit' => 'contact.edit',
        'update' => 'contact.update',
        'destroy' => 'contact.destroy'
    ]);
    
    Route::resource('posters', PosterController::class)->names([
        'index' => 'posters.index',
        'create' => 'posters.create',
        'store' => 'posters.store',
        'edit' => 'posters.edit',
        'update' => 'posters.update',
        'destroy' => 'posters.destroy'
    ]);
});
