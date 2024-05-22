<?php

namespace App\Http\Resources\Car;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Services\ImageServices\ImageService;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'car_class' => $this->car_class,
            'brand' => $this->brand,
            'color' => $this->color,
            'engine_type' => $this->engine_type,
            'engine_power' => $this->engine_power,
            'wheel_drive' => $this->wheel_drive,
            'zero_to_full' => $this->zero_to_full,
            'price' => $this->price,
            'image_path' => $this->converToArray($this->image_path),
        ];
    }

    private function converToArray($imagePath): array
    {
        return explode(',', $imagePath);
    }
}
