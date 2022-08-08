<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ProductModel
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property int $engine_type
 * @property int $drive_type
 * @property string $brand_id
 *
 * @property Collection|Product[] $products
 * @property Brand $brand
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class CarModel extends Model
{
    use HasFactory;

    const TYPE_ENGINE_GAS = 0;
    const TYPE_ENGINE_DIESEL = 1;
    const TYPE_ENGINE_HYBRID = 2;

    const TYPE_DRIVE_FOUR = 0;
    const TYPE_DRIVE_FRONT = 1;

    const TYPES_ENGINE = [
        self::TYPE_ENGINE_GAS => 'Бензиновый',
        self::TYPE_ENGINE_DIESEL => 'Дизельный',
        self::TYPE_ENGINE_HYBRID => 'Гибридный',
    ];

    const TYPES_DRIVE = [
        self::TYPE_DRIVE_FOUR => 'Полный',
        self::TYPE_DRIVE_FRONT => 'Передный',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class,'model_id');
    }

    public function scopeWhereIsNotNull(Builder $builder, string $column, $value)
    {
        if (! is_null($value)) {
            $builder->where($column, $value);
        }
    }
}
