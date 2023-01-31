<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $guareded = [];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
