<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $slug
 * @property string $content
 */
class BlogPost extends Model
{
    use HasFactory;
}
