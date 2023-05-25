<?php

namespace App\Models\Furniture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Furniture\FurnitureConfiguration
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|FurnitureConfiguration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FurnitureConfiguration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FurnitureConfiguration query()
 * @method static \Illuminate\Database\Eloquent\Builder|FurnitureConfiguration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FurnitureConfiguration whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FurnitureConfiguration whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FurnitureConfiguration whereType($value)
 * @mixin \Eloquent
 */
class FurnitureConfiguration extends Model
{
    use HasFactory;

    public function furniture(): BelongsToMany
    {
        return $this->belongsToMany(Furniture::class, 'configuration_furniture_assignment', 'configuration_id', 'furniture_id');
    }
}
