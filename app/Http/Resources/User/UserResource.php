<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Enum\RoleEnum;
use App\Http\Resources\BookingCar\BookingCarResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id'=>$this->id,
          'name'=>$this->name,
          'email'=>$this->email,
          'role'=>RoleEnum::from($this->role_id)->label(),
          
          'orders'=>BookingCarResource::collection($this->bookingCars)

        ];
        
    }
}
