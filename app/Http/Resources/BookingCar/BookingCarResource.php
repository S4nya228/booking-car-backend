<?php

namespace App\Http\Resources\BookingCar;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'car_id' => $this->id,
            'user' => $this->user,
            'car' => $this->car,
            'phone_number' => $this->phone_number,
            'booking_date' => $this->booking_date,
            'lease_term' => $this->lease_term,
            'destination' => $this->destination,
            'order_status' => $this->order_status,
        ];
    }
}
