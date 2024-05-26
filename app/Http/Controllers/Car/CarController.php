<?php

namespace App\Http\Controllers\Car;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Car\CarResource;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Car::filter($request);

        return CarResource::collection($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return CarResource::make($car);
    }
}
