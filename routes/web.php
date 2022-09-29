<?php

use App\Http\Controllers\colorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductsController;

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
Route::get('/addUser',[UserController::class,'index']);
Route::get('/allUser',[UserController::class,'allUser']);
Route::get('brandManager',[BrandController::class,'index']);
Route::get('categrories',[CategoryController::class,'index']);
Route::get('colorManager',[colorController::class,'index']);
Route::get('sizeManager',[SizeController::class,'index']);
Route::get('tagManager',[TagController::class,'index']);
// Route::get('/brandManager',[ProductsController::class,"index"]);
Route::get('/prodManager',[ProductsController::class,"index"]);
// Route::get('/allProduct',[ProductsController::class,"index"]);
// Route::get('/addProduct',[ProductsController::class,"addprod"]);
// Route::get('/editProduct',[ProductsController::class,"editprod"]);