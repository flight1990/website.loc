<?php

namespace Modules\Gallery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Gallery\Database\factories\PhotoFactory;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'album_id'
    ];

    protected $casts = [
        'img' => 'json'
    ];

    protected static function newFactory()
    {
        return PhotoFactory::new();
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
