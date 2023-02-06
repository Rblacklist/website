<?php

namespace Modules\Order\Entities;

use Modules\Order\Entities\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // -----------------------------Relations---------------------------------------
    // Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'status_order_id', 'id');
    }
}
