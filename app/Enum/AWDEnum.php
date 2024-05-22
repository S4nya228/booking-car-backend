<?php

namespace App\Enum;

enum AWDEnum: int
{
    case AWD = 1;
    case FWD = 2;
    case RWD = 3;

    public function translations(): string
    {
        return match ($this) {
            self::AWD => 'Повний привід',
            self::FWD => 'Передній привід',
            self::RWD => 'Задній привід',
            default => 'Повний привід',
        };
    }
}
