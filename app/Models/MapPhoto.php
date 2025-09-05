<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MapPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'map_id',
        'photo_path',
        'caption',
        'order'
    ];

    public function map(): BelongsTo
    {
        return $this->belongsTo(Map::class);
    }
}