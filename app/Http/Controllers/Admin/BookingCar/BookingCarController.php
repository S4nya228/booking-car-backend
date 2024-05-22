<?php

namespace App\Http\Controllers\Admin\BookingCar;

use App\Models\BookingCar;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\ImageServices\ImageService;
use App\Http\Resources\BookingCar\BookingCarResource;
use App\Http\Requests\Admin\BookingCar\BookingCarRequest;

class BookingCarController extends Controller
{
    public function __construct(private ImageService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookingCarResource::collection(BookingCar::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(BookingCar $bookingCar)
    {
        return BookingCarResource::make($bookingCar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingCarRequest $request, BookingCar $bookingCar)
    {
        $data = $this->service->validationData($request);

        $bookingCar->update($data);

        return response()->json(['message' => 'Update success'], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingCar $bookingCar)
    {
        $bookingCar->delete();

        return response()->noContent();
    }
}
