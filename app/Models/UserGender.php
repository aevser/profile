<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserGender extends Model
{
    protected $table = 'user_genders';

    protected $fillable = ['name', 'type'];

    // Связи

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
