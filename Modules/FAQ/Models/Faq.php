<?php

namespace Modules\FAQ\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\FAQ\Database\factories\FaqFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected static function newFactory(): FaqFactory
    {
        return FaqFactory::new();
    }
}
