<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DewaniyaCategoryController;
use App\Http\Controllers\Admin\DewaniyaSubCategoryController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\web\RegisterController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\PackageController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('register', [AdminRegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AdminRegisterController::class, 'register']);

    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    

    Route::middleware('auth:admin')->group(function () {
        Route::resource('dewaniya_categories', DewaniyaCategoryController::class);
        Route::resource('dewaniya_sub_categories', DewaniyaSubCategoryController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('packages', PackageController::class);
       Route::get('packages/{package}/features', [PackageController::class, 'features'])->name('packages.features');
       Route::post('packages/{package}/features', [PackageController::class, 'storeFeature'])->name('packages.features.store');
       Route::delete('packages/{package}/features/{feature}', [PackageController::class, 'deleteFeature'])->name('packages.features.delete');



        
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        
     
    });
});


Route::get('/user/Auth/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/Auth/login', [UserLoginController::class, 'login']);
