<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeAuthor extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id',
        'author_id',
    ];
}
