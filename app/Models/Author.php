<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Anime;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
    ];

    public function anime(){
        return $this->belongsToMany(Anime::class);
    }
}
