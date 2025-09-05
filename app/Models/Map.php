<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'latitude',
        'longitude',
        'address',
        'type',
        'color',
        'link_map',
        'icon',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8'
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(MapPhoto::class)->orderBy('order');
    }

    public function getGoogleMapsUrlAttribute()
    {
        return "https://www.google.com/maps?q={$this->latitude},{$this->longitude}";
    }

    public function getFirstPhotoAttribute()
    {
        return $this->photos->first();
    }

    public function getTypeColorAttribute()
    {
        $colors = [
            'general' => '#FF0000',
            'important' => '#00FF00',
            'facility' => '#0000FF'
        ];

        return $colors[$this->type] ?? '#FF0000';
    }
}