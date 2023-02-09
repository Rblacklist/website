<?php

namespace Modules\Product\Entities;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\ProductOrder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getImageAttribute($value)
    {
        if (Str::startsWith($value, 'http')) {
            return $value;
        } elseif (file_exists(public_path('images/products/' . $value)) && !empty($value)) {
            return asset('public/images/products/' . $value);
        } else {
            return asset('public/404.png');
        }
    }

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
