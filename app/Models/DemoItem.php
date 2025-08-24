<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoItem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'priority'
    ];

    protected $casts = [
        'priority' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByPriority($query)
    {
        return $query->orderBy('priority', 'desc');
    }
}
