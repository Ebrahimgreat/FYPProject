<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;


    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'phone','email','user_profile_id'];
    //
}
