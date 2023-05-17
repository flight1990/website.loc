<?php

namespace Modules\Reviews\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Reviews\Database\factories\ReviewFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'is_active',
        'client'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected static function newFactory()
    {
        return ReviewFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->whereIsActive(1);
    }
}
