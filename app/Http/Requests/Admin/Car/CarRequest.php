<?php

namespace App\Http\Requests\Admin\Car;

use App\Enum\AWDEnum;
use App\Enum\CarClassEnum;
use App\Enum\EngineTypeEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'car_class' => ['required', Rule::enum(CarClassEnum::class)],
            'brand' => ['required', 'string'],
            'color' => ['required', 'string'],
            'engine_type' => ['required', Rule::enum(EngineTypeEnum::class)],
            'engine_power' => ['required', 'integer'],
            'wheel_drive' => ['required', Rule::enum(AWDEnum::class)],
            'zero_to_full' => ['required', 'decimal:0,100'],
            'price' => ['required', 'string'],
            'image_path.*' => ['required', 'image', 'max:8192', 'mimes:png,jpg,gif,jpeg,webp'],
        ];
    }
}
