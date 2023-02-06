<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\ProductOrder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // -----------------------------Relations---------------------------------------
    // Products_order
    public function productsOrder()
    {
        return $this->hasMany(ProductOrder::class);
    }

    // -----------------------------Scopes---------------------------------------
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }


    // ---------------------------Factory-----------------------------------------
    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
