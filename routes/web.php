<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\FeedbackController;


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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function()
{
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/categories', AdminCategoryController::class);
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/double/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
Route::get('/auth', [AuthController::class, 'index'])
    ->name('auth.index');
Route::get('/greet', [GreetController::class, 'index'])
    ->name('greet.index');
Route::resource('/feedback', FeedbackController::class);




