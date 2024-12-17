<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class brands extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $fillable = ['name','description','user_profile_id'];
    public function products(): HasMany
    {
        return $this->hasMany('brand_id','id');
    }
    public function userProfile():BelongsTo
    {
        return $this->belongsTo(userprofile::class);
    }




    //
}
