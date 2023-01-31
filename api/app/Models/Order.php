<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guareded = [];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Source()
    {
        return $this->belongsTo(Source::class);
    }

    public function DeliveryCompany()
    {
        return $this->belongsTo(DeliveryCompany::class);
    }

    public function StatusOrder()
    {
        return $this->belongsTo(StatusOrder::class);
    }



}
