<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Project
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 *
 * @property User $projectUser
 * @property Collection|User[] $users
 */
class Project extends Model
{
    use HasFactory;

    public function projectUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
