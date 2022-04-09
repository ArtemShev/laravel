<?php

use \App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', AdminController::class)
        ->name('index');

    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::get('/categories', [CategoryController::class,'CategoriesList'])->name('news.CategoryList');
// Route::get('/review',NewsController::class)->name('review');
// Route::post('/news/review_store',[NewsController::class,'store'])->name('news.store');
// Route::get('/news', [ NewsController::class, 'allNews'])-> name('all_news');
Route::get('/news/{category_id}', [ NewsController::class, 'index'])-> name('news');
Route::get('/news/{category_id}/{id}', [ NewsController::class, 'show'])
->where('id', '\d+')
->name('news.show');