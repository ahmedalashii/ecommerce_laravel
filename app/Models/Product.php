<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function getPriceAttribute()
    {
        // Product::find($id)->price
        return $this->is_discount ? $this->discount_price : $this->base_price;
    }


    public function getProductPictureAttribute()
    {
        return asset("storage/$this->picture");
    }

    public function purchase_transactions()
    {
        return $this->hasMany(PurchaseTransaction::class);
    }

    // Product M-1 Store
    // Every product belongs to one store, and every store has many products
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
