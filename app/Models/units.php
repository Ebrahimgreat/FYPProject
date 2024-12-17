<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class units extends Model
{
    protected $table = 'units';
    protected $fillable = [];
    /** @use HasFactory<\Database\Factories\UnitsFactory> */
    use HasFactory;
}
