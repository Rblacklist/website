<?php

namespace Modules\Order\Entities;


use Modules\Store\Entities\Store;
use Modules\Source\Entities\Source;
use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customer;
use Modules\Order\Entities\StatusOrder;
use Modules\Order\Entities\ProductsOrder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\DeliveryCompany\Entities\DeliveryCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

     // -----------------------------Relations---------------------------------------
    // customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Source
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    // Source
    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    // Delivery company
    public function deliveryCompany()
    {
        return $this->belongsTo(DeliveryCompany::class);
    }

    // Status order
    public function statusOrder()
    {
        return $this->belongsTo(StatusOrder::class, 'status_order_id', 'id');
    }

    // Product Order
    public function productsOrder()
    {
        return $this->hasMany(ProductsOrder::class);
    }

    //-------------------scopes------------------------

    public static function scopeStatus($query, $statusOrderId){
        return $query->where('status_order_id', $statusOrderId);
    }

    public static function scopeBetweenTwoDates($query, $dates){
        return true;
    }
}
