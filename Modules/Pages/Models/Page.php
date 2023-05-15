<?php

namespace Modules\Pages\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pages\Database\factories\PageFactory;

class Page extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_active',
        'meta_keywords',
        'meta_description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'date:d.m.Y',
        'updated_at' => 'date:d.m.Y',
    ];


    protected static function newFactory(): PageFactory
    {
        return PageFactory::new();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
