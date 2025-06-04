<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDewaniyaCategoryController;
use App\Http\Controllers\AdminDewaniyaSubCategoryController;


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


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout'); 

    Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('dewaniya_categories', AdminDewaniyaCategoryController::class);
    Route::resource('dewaniya_sub_categories', AdminDewaniyaSubCategoryController::class);

    Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
});

});