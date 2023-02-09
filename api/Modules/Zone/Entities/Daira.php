<?php

namespace Modules\Zone\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daira extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['updated_at', 'created_at'];


    public function wilaya(){
        return $this->belongsTo(Wilaya::class, 'wilaya_id', 'id');
    }
}
