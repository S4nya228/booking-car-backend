<?php

namespace App\Http\Controllers\Admin\Car;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Car\CarResource;
use App\Http\Requests\Admin\Car\CarRequest;
use App\Services\ImageServices\ImageService;

class CarController extends Controller
{
    public function __construct(private ImageService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarResource::collection(Car::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $data = $this->service->validationData($request);

        $car = Car::create($data);



        return CarResource::make($car);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return CarResource::make($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $data = $this->service->validationData($request);

        $car->update($data);

        return response()->json(['message' => 'Updated success'], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response()->noContent();
    }
}
