<?php

namespace Modules\Customer\Entities;

use Modules\Order\Entities\Order;
use Modules\Customer\Entities\Phone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customer\Database\factories\CustomerFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    //-----------------------------Relations------------------------------------
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    // -----------------------------Scopes---------------------------------------
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }


    // ---------------------------Factory-----------------------------------------
    protected static function newFactory()
    {
        return CustomerFactory::new();
    }
}
