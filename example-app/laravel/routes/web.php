
<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return <<<php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome user</title>
</head>
<body>
    <h1>Welcome user</h1>
    <span> скоро тут появится наш сайт </span>
</body>
</html>
php;
});
Route::get('/info', function (){
    return <<<php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome user</title>
</head>
<body>
    <h1>Information</h1>
    <span> скоро тут появится наш сайт </span>
</body>
</html>
php;
});
Route::get('/news', function (){
    return <<<php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome user</title>
</head>
<body>
    <h1>News</h1>
    <span> скоро тут появится наш сайт </span>
</body>
</html>
php;
});