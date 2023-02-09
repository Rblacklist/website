<?php

namespace Modules\Zone\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'regions' => 'array'
    ];

    protected $hidden = ['updated_at'];

    

}
