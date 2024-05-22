<?php

namespace App\Enum;

enum OrderStatusEnum: int
{
    case DONE = 1;
    case CONFIRMATION = 2;
    case CANCELED = 3;

    public function translations(): string
    {
        return match ($this) {
            self::DONE => 'Виконано',
            self::CONFIRMATION => 'Очікує підтвердження',
            self::CANCELED => 'Скасовано',
            default => 'Скасовано',
        };
    }
}
