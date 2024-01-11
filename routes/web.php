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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user/login',[AuthController::class,'index'])
        ->name('user.login');

Route::get('/register', function () {
     return view('auth.register');
});

Route::post('/user/register',[AuthController::class,'store'])
        ->name('user.register');