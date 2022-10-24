<?php

namespace App\Models;

use App\Enums\Question\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Question
 * @package App\Models
 *
 * @property int $id
 * @property string $first_name
 * @property string $email
 * @property string $title
 * @property string $message
 * @property int $status
 * @property null|string $comment
 * @property int $project_id
 * @property int $worker_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Project $project
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'title',
        'message',
        'email',
        'comment',
        'status',
        'worker_id'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeOfTitle(Builder $builder, string $value): Builder
    {
        return $builder->where('title', $value);
    }

    public function scopeOfWorker(Builder $builder, int $value): Builder
    {
        return $builder->where('worker_id', $value);
    }

    public function scopeOfProject(Builder $builder, int $value): Builder
    {
        return $builder->where('project_id', $value);
    }

    public function isActive(): bool
    {
        return $this->status === Status::ACTIVE;
    }
}
