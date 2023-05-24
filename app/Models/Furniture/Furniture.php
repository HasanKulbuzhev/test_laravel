<?php

namespace App\Models\Furniture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
