<?php

use App\Http\Controllers\Admin\BookingCar\BookingCarController;
use App\Http\Controllers\Admin\Car\CarController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cars', CarController::class);
Route::apiResource('booking', BookingCarController::class)->except('store');
  