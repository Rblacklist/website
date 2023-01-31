<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guareded = [];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

}
