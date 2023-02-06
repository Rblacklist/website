<?php

namespace Modules\Customer\Entities;


use Modules\Customer\Entities\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customer\Database\factories\PhoneFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    // -----------------------------Relations---------------------------------------
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    // -----------------------------Factory---------------------------------------
    protected static function newFactory()
    {
        return PhoneFactory::new();
    }
}
