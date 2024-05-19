<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'urlVideo', 'urlAudio', 'url3DModel', 'description', 'latitude', 'longitude'];
}
