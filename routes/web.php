<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PostController;

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
Route::group(['user'],function(){
    Route::group(['middleware'=>'guest'],function(){
        // User login Routes
        Route::get('user/loginpage',[AuthController::class,'loginpage'])->name('user.loginpage');
        Route::get('user/processlogin',[AuthController::class,'login'])->name('user.login');
        // User Register Routes
        Route::get('/user/registerpage',[AuthController::class,'registerpage'])->name('user.registerpage');
        Route::post('/user/processregister',[AuthController::class,'register'])->name('user.register');
    });
    Route::group(['middleware'=>'auth'],function(){
        // Wellcome page And Logout Routes
        Route::get('/',[AuthController::class,'index'])->name('welcome'); 
        Route::post('user/logout', [AuthController::class, 'logout'])->name('user.logout');
    });
});
//     Category Route
Route::resource('category',CategoryController::class);
//     Sub Category Route
Route::resource('subcategory',SubCategoryController::class);
//     Blog Posting Route
Route::resource('post',PostController::class);