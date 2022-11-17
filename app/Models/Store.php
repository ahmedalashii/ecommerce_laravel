<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
   use SoftDeletes;

   
   public function getLogoImageAttribute()
   {
      return asset("storage/$this->logo");
   }
}
