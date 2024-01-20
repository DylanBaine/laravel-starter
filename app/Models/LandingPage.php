<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $slug
 * @property string $content_blocks
 */
class LandingPage extends Model
{
    use HasFactory;

    protected $casts = [
        'content_blocks' => 'array',
    ];
}
