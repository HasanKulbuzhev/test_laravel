<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Car
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property int $model_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model
{
    use HasFactory;

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }
}
