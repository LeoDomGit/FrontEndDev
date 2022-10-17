<?php

use App\Http\Controllers\colorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoragesCotroller;
use App\Http\Controllers\loginController;
use App\Http\Controllers\GoogleController;



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
//test thử
Route::get('/', [loginController::class, "index"]);
Route::get('/login', [loginController::class, "index"])->middleware('IfLogined');
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-auth')->middleware('IfLogined');
Route::get('auth/google/call-back', [GoogleController::class, 'callbackGoogle'])->middleware('IfLogined');
Route::middleware('checkLogin')->group(function() {
    Route::get('/addUser', [UserController::class, 'index']);
    Route::get('/users', [UserController::class, 'allUser']);
    Route::get('brandManager', [BrandController::class, 'index']);
    Route::get('categrories', [CategoryController::class, 'index']);
    Route::get('colorManager', [colorController::class, 'index']);
    Route::get('sizeManager', [SizeController::class, 'index']);
    Route::get('tagManager', [TagController::class, 'index']);
    Route::get('storagesManager', [StoragesCotroller::class, 'index']);
    Route::get('/prodManager', [ProductsController::class, "index"]);
    Route::get('/afterlogin', [loginController::class, "afterlogin"]);
    Route::get('/logout', [loginController::class, "logout"]);
});
