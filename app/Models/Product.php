<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getPriceAttribute(){ // Product::find($id)->price
        return $this->is_discount ? $this->discount_price : $this->base_price;
    }
}
