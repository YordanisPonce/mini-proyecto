<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPoint extends Model
{
    use HasFactory;

    protected $fillable = ['app_id', 'point_id'];
}
