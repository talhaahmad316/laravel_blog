<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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
Route::group(['prefix'=>'/'],function(){
    Route::group(['middleware'=>'guest'],function(){
        Route::get('user/loginpage',[AuthController::class,'loginpage'])->name('user.loginpage');
        Route::get('user/processlogin',[AuthController::class,'login'])->name('user.login');
        Route::get('/user/registerpage',[AuthController::class,'registerpage'])->name('user.registerpage');
        Route::post('/user/processregister',[AuthController::class,'register'])->name('user.register');
        Route::get('verify/{id}', [AuthController::class, 'verifyEmail'])->name('verifyEmail');
    });
    Route::group(['middleware'=>'auth'],function(){
        Route::get('/',[AuthController::class,'index'])->name('welcome'); 
        Route::post('user/logout', [AuthController::class, 'logout'])->name('user.logout');
        Route::resource('category',CategoryController::class);
        Route::resource('subcategory',SubCategoryController::class);
        Route::resource('post',PostController::class);
        Route::resource('permission',PermissionController::class);
        Route::resource('role',RoleController::class);
        Route::get('role/{roleId}/add/permission',[RoleController::class,'AddPermissionToRoles'])->name('role.addpermission');
        Route::post('role/{roleId}/give/permission',[RoleController::class,'GivePermissionToRoles'])->name('role.givepermission');
    });
});