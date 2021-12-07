<?php

namespace LyneTechnologies\LaravelWatchtower\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class Error extends Model
{
    use HasFactory, Prunable;

    protected $guarded = [];

    protected $casts = [
        'stack_trace' => 'array'
    ];

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        if(config('laravel-watchtower.notifications.local.prune') > 0) {
            return static::where('created_at', '<=', now()->subDays(config('laravel-watchtower.notifications.local.prune')));
        }
    }
}