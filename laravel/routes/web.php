<?php

use App\Http\Controllers\Account\IndexController;
use \App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Account\IndexController as AccountController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUsersController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\ParseNewsController;
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
})->name('welcome');


Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=>'account', 'as'=>'account.'], function(){
        Route::get('/', AccountController::class)->name('index');
        Route::get('/logout',function(){
            Auth::logout();
            return redirect()->route('login');
        })->name('logout');
    });
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>'admin.check'], function() {
        Route::get('/home', AdminController::class)
            ->name('index');
        Route:: get('parser', ParserController::class)->name('parser');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUsersController::class);
        Route::resource('resources', AdminResourceController::class);
    });
});

Route::get('/categories', [CategoryController::class,'CategoriesList'])
    ->name('news.CategoryList');
// Route::get('/review',NewsController::class)->name('review');
// Route::post('/news/review_store',[NewsController::class,'store'])->name('news.store');
// Route::get('/news', [ NewsController::class, 'allNews'])-> name('all_news');
Route::get('/news', [ NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{news}', [ NewsController::class, 'show'])
->where('news', '\d+')
->name('news.show');
Route::get('/parsedNews', [ ParseNewsController::class, 'index'])
    ->name('parsedNews');
Route::get('/parsedNews/{parsedNews}', [ ParseNewsController::class, 'show'])
    ->where('parsedNews', '\d+')
    ->name('parsedNews.show');
Auth::routes();
Route::group(['middleware' => 'guest'], function() {
	Route::get('/auth/{network}/redirect', [SocialController::class, 'index'])
		->where('network', '\w+')
		->name('auth.redirect');
	Route::get('/auth/{network}/callback', [SocialController::class, 'callback'])
		->where('network', '\w+')
		->name('auth.callback');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

