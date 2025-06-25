<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\DewaniyaCategoryController;
use App\Http\Controllers\Admin\DewaniyaSubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\Admin\ContactController;

Route::prefix('admin')->name('admin.')->group(function () {

    
    Route::get('register', [AdminRegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AdminRegisterController::class, 'register']);
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    

   
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

       
        Route::resource('users', UserController::class);
        Route::resource('packages', PackageController::class);
        Route::resource('dewaniya_categories', DewaniyaCategoryController::class);
        Route::resource('dewaniya_sub_categories', DewaniyaSubCategoryController::class);

        
        Route::get('packages/{package}/features', [FeatureController::class, 'index'])->name('features.index');
        Route::get('packages/{package}/features/create', [FeatureController::class, 'create'])->name('features.create');
        Route::post('packages/{package}/features', [FeatureController::class, 'store'])->name('features.store');

        
        Route::get('features/{feature}/edit', [FeatureController::class, 'edit'])->name('features.edit');
        Route::put('features/{feature}', [FeatureController::class, 'update'])->name('features.update');
        Route::delete('features/{feature}', [FeatureController::class, 'destroy'])->name('features.destroy');

        Route::resource('services', ServiceController::class);

        
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

        Route::get('/about', function () {
            return view('admin.pages.about');
        })->name('about');
        
    });
});


Route::get('/user/Auth/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/Auth/login', [UserLoginController::class, 'login']);
