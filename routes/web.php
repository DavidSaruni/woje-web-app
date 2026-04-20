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
Route::get('/careers', [WebController::class, 'careers'])->name('careers');
Route::post('/contact', [WebController::class, 'submitContact'])->name('contact.submit');
Route::get('/board', [WebController::class, 'board'])->name('board');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/team/zabib-musa-loro', [WebController::class, 'zabibLoro'])->name('team.zabib-loro');
Route::get('/team/joyce-phillip-gaza', [WebController::class, 'joycePhillipGaza'])->name('team.joyce-phillip-gaza');
Route::get('/team/lamya-ibrahim-badri', [WebController::class, 'lamyaIbrahimBadri'])->name('team.lamya-ibrahim-badri');
Route::get('/team/allen-samanya-zabibu', [WebController::class, 'allenSamanyaZabibu'])->name('team.allen-samanya-zabibu');
Route::get('/team/sebit-abdulkarim', [WebController::class, 'sebitAbdulkarim'])->name('team.sebit-abdulkarim');
Route::get('/team/hamida-khamisa', [WebController::class, 'hamidaKhamisa'])->name('team.hamida-khamisa');
Route::get('/team/yika-marina-mogga', [WebController::class, 'yikaMarinaMogga'])->name('team.yika-marina-mogga');
Route::get('/team/jennifer-john-malachi', [WebController::class, 'jenniferJohnMalachi'])->name('team.jennifer-john-malachi');
Route::get('/team/maura-ajak', [WebController::class, 'mauraAjak'])->name('team.maura-ajak');
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

Route::get('/symlink', function () {
    $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
    $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
    symlink($target, $link);
    echo "Done";
 });
