<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseTransaction extends Model
{
    use SoftDeletes;

    public function product(){
        return $this->belongsTo(Product::class)->withTrashed();
    }
}
