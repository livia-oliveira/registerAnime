<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'id',
        'number_of_episodes',
        'state',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function author(){
        return $this->belongsToMany();
    }
}
