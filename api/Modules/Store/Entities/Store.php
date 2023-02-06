<?php

namespace Modules\Store\Entities;

use Modules\Order\Entities\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Store\Database\factories\StoreFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // -----------------------------Relations---------------------------------------
    public function orders(){
        return $this->hasMany(Order::class, 'store_id', 'id');
    }

    //------------------------Factory--------------------------------
    public static function  newFactory(){
        return new StoreFactory();
    }


    // -----------------------------Scopes---------------------------------------
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
