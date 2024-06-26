<?php

namespace App\Enum;

enum CarClassEnum:int
{
    case BUSINESS = 1;
    case CABRIOLET = 2;
    case COUPE = 3;
    case ELECTRO_CAR = 4;
    case MINIVAN = 5;
    case OFF_ROADS = 6;
    case PREMIUM = 7;
    case SPORTCAR = 8;

    public function translations(): string
    {
        return match ($this) {
            self::BUSINESS => 'Бізнес',
            self::CABRIOLET => 'Кабріолети',
            self::COUPE => 'Купе',
            self::ELECTRO_CAR => 'Електрокари',
            self::MINIVAN => 'Мінівени',
            self::OFF_ROADS => 'Позашляховики',
            self::PREMIUM => 'Преміум',
            self::SPORTCAR => 'Спорткари',
            default => 'Бізнес',
        };
    }
}
