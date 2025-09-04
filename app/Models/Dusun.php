<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'head_name',
        'head_phone',
        'population',
        'households',
        'description',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'population' => 'integer',
        'households' => 'integer'
    ];
}