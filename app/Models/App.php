<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class App extends Model
{
    use HasFactory;
    protected $fillable = ['uuid'];

    public function visits(): BelongsToMany
    {
        return $this->belongsToMany(Point::class, 'app_points', 'app_id', 'point_id');
    }

    public function times(): HasMany
    {
        return $this->hasMany(AppTime::class);
    }

}
