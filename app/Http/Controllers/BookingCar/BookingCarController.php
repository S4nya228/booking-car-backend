<?php

namespace App\Http\Controllers\BookingCar;

use App\Models\BookingCar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\ImageServices\ImageService;
use App\Http\Requests\BookingCar\BookingCarRequest;

class BookingCarController extends Controller
{
    public function __construct(private ImageService $service)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingCarRequest $request)
    {
        $data = $this->service->validationData($request);

        BookingCar::create($data);

        return response()->json(['message' => 'Sended success'], Response::HTTP_CREATED);
    }
}
