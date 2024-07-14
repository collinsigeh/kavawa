<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso_code_2',
        'flag',
        'full_name',
        'is_all_state_added'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    
    public function entities(): HasMany
    {
        return $this->hasMany(Entity::class);
    }
}
