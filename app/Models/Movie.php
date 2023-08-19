<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'name',
        'grade',
        'description',
        'actor',
        'genre',
        'movie_period'
    ];
}
