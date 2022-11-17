<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
   use SoftDeletes;

   // Product M-1 Store
   // Every product belongs to one store, and every store has many products
   public function products()
   {
      return $this->hasMany(Product::class);
   }

   public function productsWithTrashed()
   {
      return $this->hasMany(Product::class)->withTrashed();
   }

   public function getLogoImageAttribute()
   {
      return asset("storage/$this->logo");
   }
}
