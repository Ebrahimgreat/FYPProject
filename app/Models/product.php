<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class product extends Model
{
    use HasFactory;

  protected $table = 'products';
  protected $fillable = ['name','brand_id','location','sku','unitPurchasePrice','unit_id'];


  public function brands():BelongsTo{
      return $this->belongsTo(brands::class,'brand_id','id');

  }
  public function units():BelongsTo{
      return $this->belongsTo(units::class,'unit_id','id');
  }

  public function variations():HasMany{
      return $this->hasMany(variations::class,'product_id','id');
  }
    //
}
