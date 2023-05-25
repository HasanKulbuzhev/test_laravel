<?php

namespace App\Enums;

enum RoomType: int
{
    case HALLWAY = 0;
    case KITCHEN = 1;
    case LIVING = 2;
    case BATH = 3;
    case BEDROOM = 4;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}