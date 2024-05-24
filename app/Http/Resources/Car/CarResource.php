<?php

namespace App\Http\Resources\Car;

use App\Enum\AWDEnum;
use App\Enum\CarClassEnum;
use App\Enum\EngineTypeEnum;
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
            'id' => $this->id,
            'name' => $this->name,
            'car_class' =>["id"=> $this->car_class, 'label' => CarClassEnum::from($this->car_class)->translations()],
            'brand' => $this->brand,
            'color' => $this->color,
            'engine_type' => ["id"=> $this->engine_type, 'label' => EngineTypeEnum::from($this->engine_type)->translations()],
            'engine_power' => $this->engine_power,
            'wheel_drive' => ["id"=> $this->wheel_drive, 'label' => AWDEnum::from($this->wheel_drive)->translations()],
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
