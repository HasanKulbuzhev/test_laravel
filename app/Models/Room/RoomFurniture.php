<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Room\RoomFurniture
 *
 * @property int $id
 * @property int $room_id
 * @property int $furniture_id
 * @property string $from_date
 * @property string $to_date
 * @method static \Illuminate\Database\Eloquent\Builder|RoomFurniture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomFurniture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomFurniture query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomFurniture whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomFurniture whereFurnitureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomFurniture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomFurniture whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomFurniture whereToDate($value)
 * @mixin \Eloquent
 */
class RoomFurniture extends Model
{
    use HasFactory;
}
