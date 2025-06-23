<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ForgotPasswordController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController; 
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\DewaniyaCategoryController;
use App\Http\Controllers\Admin\DewaniyaSubCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


//Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AdminLoginController::class, 'login']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::post('/reset-password',  [ResetPasswordController::class, 'reset']);

Route::middleware('auth:api')->post('/logout', [LogoutController::class, 'logout']);


Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminLoginController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/users',        [AdminUserController::class, 'index']);
        Route::post('/categories',  [DewaniyaCategoryController::class, 'store']);
        Route::post('/subcategories', [DewaniyaSubCategoryController::class, 'store']);
    });
});
