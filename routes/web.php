<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\ParserController as ParserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SocialController;


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

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/account', AccountController::class)->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function()
    {
        Route::get('/parser', ParserController::class)
            ->name('parser');
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/sources', AdminSourceController::class);
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/users', AdminUserController::class);
    });
});

Route::group(['middleware' => 'guest'], function()
{
    Route::get('/github/link', [SocialController::class, 'link'])
		->name('github.link');
	Route::get('/github/callback', [SocialController::class, 'callback'])
		->name('github.callback');
});


Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/double/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');
Route::get('/auth', [AuthController::class, 'index'])
    ->name('auth.index');
Route::get('/greet', [GreetController::class, 'index'])
    ->name('greet.index');
Route::resource('/feedback', FeedbackController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
