<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;


Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(PackageController::class)->prefix('packages')->group(function () {
        Route::get('', 'index')->name('packages');
        Route::get('create', 'create')->name('packages.create');
        Route::post('store', 'store')->name('packages.store');
        Route::get('show/{id}', 'show')->name('packages.show');
        Route::get('edit/{id}', 'edit')->name('packages.edit');
        Route::put('edit/{id}', 'update')->name('packages.update');
        Route::delete('destroy/{id}', 'destroy')->name('packages.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');

});
