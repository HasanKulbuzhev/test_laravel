<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proxy extends Model
{
    use HasFactory;

    protected $fillable = [
          'ip',
        'port',
        'status',
        'type',
        'location',
        'timeout',
        'original_ip',
        'group_id',
    ];

    public function getUrlAttribute(): string
    {
        return 'http://' . $this->ip . ':' . trim($this->port);
    }
}
