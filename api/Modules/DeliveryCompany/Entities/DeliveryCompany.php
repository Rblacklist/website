<?php

namespace Modules\DeliveryCompany\Entities;

use Modules\Order\Entities\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\DeliveryCompany\Database\factories\DeliveryCompanyFactory;

class DeliveryCompany extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

     // -----------------------------Relations---------------------------------------
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function newFactory(){
        return new DeliveryCompanyFactory();
    }


    //-------------------scopes------------------------

    public static function scopeStatus($query, $status){
        return $query->where('status', $status);
    }


}
