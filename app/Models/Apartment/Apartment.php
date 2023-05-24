<?php

namespace App\Models\Apartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Apartment\Apartment
 *
 * @property int $id
 * @property int $house_id
 * @method static \Illuminate\Database\Eloquent\Builder|Apartment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apartment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apartment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Apartment whereHouseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartment whereId($value)
 * @mixin \Eloquent
 */
class Apartment extends Model
{
    use HasFactory;
}
