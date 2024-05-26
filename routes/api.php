<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Search\SerachController;
use App\Http\Controllers\BookingCar\BookingCarController;

Route::get('/getImage/{fileName}', ImageController::class);

Route::get('/search', SerachController::class);

Route::group(['as' => 'auth.', 'controller' => AuthController::class], function () {

    Route::post('/register', 'register')
        ->middleware('guest')
        ->name('register');

    Route::post('/login', 'login')
        ->middleware('guest')
        ->name('login');

    Route::post('/logout', 'logout')
        ->middleware(['auth:sanctum'])
        ->name('logout');

    Route::post('/refresh', 'refresh')
        ->middleware(['auth:sanctum', 'ability:refreshToken'])
        ->name('refresh');
});


Route::group(['as.' => 'user.', 'prefix' => 'user', 'controller' => UserController::class], function () {
    Route::get('{user}', 'showUserProfile')->name('showProfile');

    Route::post('/', 'showCurrentUser')->name('showCurrentUser')->middleware('auth:sanctum');

    Route::post('{user}', 'updateUserProfile')->name('updateProfile')->middleware('auth:sanctum');
});

Route::apiResource('cars', CarController::class)->only(['index', 'show']);

Route::apiResource('booking', BookingCarController::class)->only(['store']);
