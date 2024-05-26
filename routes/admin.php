<?php

use App\Http\Controllers\Admin\BookingCar\BookingCarController;
use App\Http\Controllers\Admin\Car\CarController;
use App\Models\BookingCar;
use Illuminate\Support\Facades\Route;

Route::apiResource('cars', CarController::class)->except('update');
Route::post('cars/{car}', [CarController::class, 'update'])->name('update');





Route::apiResource('booking', BookingCarController::class)->except(['store', 'update']);
Route::post('booking/{booking}', [BookingCarController::class, 'update'])->name('update');
