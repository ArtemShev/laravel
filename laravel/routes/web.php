<?php

use \App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;

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
});

Route::group(['prefix'=>'admin', 'as' =>'admin'], function()
{
    Route::resource('/categories',AdminCategoryController::class);
    Route::resource('/news',AdminNewsController::class);
});
Route::get('news/categories_list', [CategoryController::class,'CategoriesList'])->name('news.CategoryList');
Route::get('/news/{category_name}', [ NewsController::class, 'index'])-> name('news');
Route::get('/news/{category_name}/{id}', [ NewsController::class, 'show'])
->where('id', '\d+')
->name('news.show');
