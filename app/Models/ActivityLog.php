<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity',
        'ip_address',
        'user_agent',
        'login_at',
        'logout_at'
    ];

    /**
     * Relationship dengan user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get activity icon based on activity type
     */
    public function getActivityIcon()
    {
        $icons = [
            'login' => 'sign-in-alt',
            'logout' => 'sign-out-alt',
            'create' => 'plus',
            'update' => 'edit',
            'delete' => 'trash',
            'download' => 'download',
            'upload' => 'upload'
        ];

        return $icons[strtolower($this->activity)] ?? 'history';
    }

    /**
     * Get activity color based on activity type
     */
    public function getActivityColor()
    {
        $colors = [
            'login' => 'success',
            'logout' => 'secondary',
            'create' => 'primary',
            'update' => 'warning',
            'delete' => 'danger',
            'download' => 'info',
            'upload' => 'success'
        ];

        return $colors[strtolower($this->activity)] ?? 'primary';
}
}