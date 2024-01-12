<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class,'index'])
        ->name('welcome');

Route::get('/register', function () {
     return view('auth.register');
});

Route::post('/user/register',[AuthController::class,'store'])
        ->name('user.register');

Route::get('registered',[AuthController::class,'show'])
       ->name('registered.users');


Route::get('/login',function(){
          return view('auth.login');
});

Route::get('/user/login',[AuthController::class,'login'])
       ->name('user.login');
