<?php

namespace App\Enum;

enum EngineTypeEnum: int
{
    case GASOLINE = 0;
    case DIESEL = 1;
    case ELECTRIC = 2;
    case HYBRID = 3;

    public function translations(): string
    {
        return match ($this) {
            self::GASOLINE => 'Бензин',
            self::DIESEL => 'Дизель',
            self::ELECTRIC => 'Електрика',
            self::HYBRID => 'Гібрид',
            default => 'Бензин',
        };
    }
}
