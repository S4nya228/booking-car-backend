<?php

namespace App\Http\Requests\Admin\BookingCar;

use App\Enum\OrderStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookingCarRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'car_id' => ['required', 'integer', 'exists:cars,id'],
            'phone_number' => ['required', 'string'],
            'booking_date' => ['required', 'date'],
            'lease_term' => ['required', 'integer'],
            'destination' => ['required', 'string'],
            'order_status' => ['required', Rule::enum(OrderStatusEnum::class)],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['user_id' => $this->user('sanctum')->id]);
    }
}
