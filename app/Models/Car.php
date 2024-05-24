<?php

namespace App\Models;

use App\Casts\AWDCast;
use App\Casts\CarClassCast;
use App\Casts\EngineTypeCast;
use App\Enum\AWDEnum;
use App\Enum\CarClassEnum;
use App\Enum\EngineTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'car_class',
        'brand',
        'color',
        'engine_type',
        'engine_power',
        'wheel_drive',
        'zero_to_full',
        'price',
        'image_path',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'car_class' => CarClassCast::class,
    //     'engine_type' => EngineTypeCast::class,
    //     'wheel_drive' => AWDCast::class,
    // ];
}
