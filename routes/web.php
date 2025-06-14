<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DewaniyaCategoryController;
use App\Http\Controllers\Admin\DewaniyaSubCategoryController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\web\RegisterController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('register', [AdminRegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AdminRegisterController::class, 'register']);

    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::resource('dewaniya_categories', DewaniyaCategoryController::class);
        Route::resource('dewaniya_sub_categories', DewaniyaSubCategoryController::class);

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
});


Route::get('/user/Auth/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/Auth/login', [UserLoginController::class, 'login']);
