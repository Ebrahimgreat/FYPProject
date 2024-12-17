<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class reports extends Model
{
    /** @use HasFactory<\Database\Factories\ReportsFactory> */
    use HasFactory;
    public function userProfile():BelongsTo
    {
        return $this->belongsTo(UserProfile::class);
    }
}
