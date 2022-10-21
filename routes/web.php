<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userP;
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

Route::get('/',[userP::class,'showreg']);
Route::get('/login',[userP::class,'showlogin']);
Route::get('/userpage',[userP::class,'showuser'])->middleware('auth');
Route::get('/logout',[userP::class,'logoutUser']);


Route::post('register',[userP::class,'registerU']);
Route::post('login',[userP::class,'loginU']);
Route::post('changepassword/{id}',[userP::class,'changepasswordU']);


