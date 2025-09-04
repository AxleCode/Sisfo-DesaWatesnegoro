<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'description'
    ];

    protected $casts = [
        'value' => 'string'
    ];

    /**
     * Get setting value by key
     */
    public static function getValue($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set setting value
     */
    public static function setValue($key, $value)
    {
        $setting = static::firstOrNew(['key' => $key]);
        $setting->value = $value;
        $setting->save();
        return $setting;
    }

    /**
     * Get social media links as array
     */
    public static function getSocialMedia()
    {
        $socialMedia = static::getValue('social_media', '{}');
        return json_decode($socialMedia, true) ?? [];
    }

    /**
     * Set social media links
     */
    public static function setSocialMedia(array $data)
    {
        return static::setValue('social_media', json_encode($data));
    }
}