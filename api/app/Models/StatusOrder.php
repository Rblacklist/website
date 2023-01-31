<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    use HasFactory;

    protected $guareded = [];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
