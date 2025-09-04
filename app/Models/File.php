<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'file_type',
        'download_count',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'download_count' => 'integer',
        'order' => 'integer'
    ];

    /**
     * Get icon based on file type
     */
    public function getIconClass()
    {
        $icons = [
            'pdf' => 'far fa-file-pdf text-danger',
            'doc' => 'far fa-file-word text-primary',
            'docx' => 'far fa-file-word text-primary',
            'xls' => 'far fa-file-excel text-success',
            'xlsx' => 'far fa-file-excel text-success',
            'zip' => 'far fa-file-archive text-warning',
            'rar' => 'far fa-file-archive text-warning',
        ];

        return $icons[$this->file_type] ?? 'far fa-file text-secondary';
    }

    /**
     * Get button class based on file type
     */
    public function getButtonClass()
    {
        $classes = [
            'pdf' => 'btn-outline-danger',
            'doc' => 'btn-outline-primary',
            'docx' => 'btn-outline-primary',
            'xls' => 'btn-outline-success',
            'xlsx' => 'btn-outline-success',
            'zip' => 'btn-outline-warning',
            'rar' => 'btn-outline-warning',
        ];

        return $classes[$this->file_type] ?? 'btn-outline-secondary';
    }
}