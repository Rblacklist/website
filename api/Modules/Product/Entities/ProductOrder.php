<?php

namespace Modules\Product\Entities;

use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

     // -----------------------------Relations---------------------------------------
    // Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
