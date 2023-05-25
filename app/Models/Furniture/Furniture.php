<?php

namespace App\Models\Furniture;

use App\Models\Room\Room;
use App\Models\Room\RoomFurniture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Furniture\Furniture
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Furniture whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Furniture extends Model
{
    use HasFactory;

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, RoomFurniture::class, 'furniture_id', 'room_id');
    }

    public function configurations(): BelongsToMany
    {
        return $this->belongsToMany(FurnitureConfiguration::class, 'configuration_furniture_assignment', 'furniture_id', 'configuration_id');
    }
}
