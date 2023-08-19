<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'years',
        'description',
    ];
}
