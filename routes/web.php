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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/addUser',[UserController::class,'index'])->middleware(['checkLogin']);;
Route::get('/users',[UserController::class,'allUser'])->middleware(['checkLogin']);;
Route::get('brandManager',[BrandController::class,'index'])->middleware(['checkLogin']);;
Route::get('categrories',[CategoryController::class,'index'])->middleware(['checkLogin']);;
Route::get('colorManager',[colorController::class,'index'])->middleware(['checkLogin']);;
Route::get('sizeManager',[SizeController::class,'index'])->middleware(['checkLogin']);;
Route::get('tagManager',[TagController::class,'index'])->middleware(['checkLogin']);;
Route::get('storagesManager',[StoragesCotroller::class,'index'])->middleware(['checkLogin']);;
// Route::get('/brandManager',[ProductsController::class,"index"]);
Route::get('/prodManager',[ProductsController::class,"index"])->middleware(['checkLogin']);;
Route::get('/login',[loginController::class,"index"])->middleware(['checkLogin']);;
Route::get('/afterlogin',[loginController::class,"afterlogin"])->middleware(['checkLogin']);;
Route::get('/logout',[loginController::class,"logout"])->middleware(['checkLogin']);;
Route::get('auth/google', [GoogleController::class,'redirect'])->name('google-auth')->middleware(['checkLogin']);;
Route::get('auth/google/call-back',[GoogleController::class,'callbackGoogle'])->middleware(['checkLogin']);;
// Route::get('/allProduct',[ProductsController::class,"index"]);
// Route::get('/addProduct',[ProductsController::class,"addprod"]);
// Route::get('/editProduct',[ProductsController::class,"editprod"]);