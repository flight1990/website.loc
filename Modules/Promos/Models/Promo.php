<?php

namespace Modules\Promos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Promos\Database\factories\PromoFactory;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'img',
        'content',
        'is_active'
    ];

    protected $casts = [
        'img' => 'json',
        'is_active' => 'boolean',
        'created_at' => 'date:d.m.Y',
        'updated_at' => 'date:d.m.Y',
    ];

    protected static function newFactory()
    {
        return PromoFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->whereIsActive(1);
    }
}
