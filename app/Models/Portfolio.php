<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'gallery',
        'location',
        'year',
        'order',
        'is_active',
        'is_featured',
        'view_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'view_count' => 'integer',
        'order' => 'integer',
    ];
}