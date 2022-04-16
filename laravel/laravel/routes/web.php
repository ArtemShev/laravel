<?php

use App\Http\Controllers\Account\IndexController;
use \App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Account\IndexController as AccountController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use Illuminate\Support\Facades\Auth;
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
        Route::get('/', AdminController::class)
            ->name('index');

        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUsersController::class);
    });
});

Route::get('/categories', [CategoryController::class,'CategoriesList'])
    ->name('news.CategoryList');
// Route::get('/review',NewsController::class)->name('review');
// Route::post('/news/review_store',[NewsController::class,'store'])->name('news.store');
// Route::get('/news', [ NewsController::class, 'allNews'])-> name('all_news');
Route::get('/news/{category_id}', [ NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{category_id}/{id}', [ NewsController::class, 'show'])
->where('id', '\d+')
->name('news.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

