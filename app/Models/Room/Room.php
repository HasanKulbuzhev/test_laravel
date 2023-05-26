<?php

namespace App\Models\Room;

use App\Models\Apartment\Apartment;
use App\Models\Furniture\Furniture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Room\Room
 *
 * @property int $id
 * @property int $type
 * @property int $apartment_id
 * @method static \Illuminate\Database\Eloquent\Builder|Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room query()
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereApartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereType($value)
 * @mixin \Eloquent
 */
class Room extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function furnitures(): BelongsToMany
    {
        return $this->belongsToMany(Furniture::class, RoomFurniture::class, 'room_id', 'furniture_id');
    }

    public function apartment(): BelongsTo
    {
        return $this->belongsTo(Apartment::class, 'apartment_id');
    }
}
