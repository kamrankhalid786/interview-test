<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'release_date', 'rating', 'price', 'country_name',
        'photo', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function genres()
    {
        return $this->hasMany('App\Models\Genres', 'movie_id', 'id');
    }
}
