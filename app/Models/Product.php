<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    public function getPriceAttribute(){ // Product::find($id)->price
        return $this->is_discount ? $this->discount_price : $this->base_price;
    }
}
