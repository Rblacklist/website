<?php

namespace Modules\Order\Entities;

use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductsOrder extends Model
{
    use HasFactory;

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
