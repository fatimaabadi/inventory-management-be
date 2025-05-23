<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\AdminController;





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





//Auth routes
Route::get('/login',[AuthController::class,'showLogin'])->name('login')->middleware('guest');

Route::get('/register',[AuthController::class,'showRegister'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class,'postRegister'])->name('register')->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::post('/login',[AuthController::class,'postLogin'])->name('login')->middleware('guest');





//admin panel route
Route::group(['prefix' => 'admin','middleware' => 'admin'],function() {
    Route::get('/',[AdminController::class,'dashboard'])->name('adminpanel');

 


 


});