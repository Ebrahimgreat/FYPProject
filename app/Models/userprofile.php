<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class userprofile extends Model
{
    use HasFactory;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Brands():HasMany
    {
        return($this->hasMany(brands::class));
    }
    public function permissions():HasMany
    {
        return($this->hasMany(permissions::class));
    }
    public function reports():HasMany
    {
        return($this->hasMany(reports::class));
    }
    public function notifications():HasMany
    {
        return($this->hasMany(notification::class));
    }
    public function customers():HasMany
    {
        return ($this->hasMany(customers::class));

    }

    public function suppliers():HasMany
    {
        return($this->hasMany(supplier::class));
    }
    public function expenses():HasMany
    {
        return($this->hasMany(expenses::class));
    }

    //
}
