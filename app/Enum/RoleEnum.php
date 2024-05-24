<?php

namespace App\Enum;

enum RoleEnum: int
{
    case ADMIN = 1;
    case MODERATOR = 2;
    case USER = 3;

    public function label():string
    {
      return match($this){
        self::ADMIN=>'admin',
        self::MODERATOR=>'moderator',
        self::USER=>'user',
      };
    }
}
