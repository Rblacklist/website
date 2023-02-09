<?php

namespace Modules\Zone\Entities;

use Modules\Zone\Entities\Daira;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wilaya extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['updated_at', 'created_at'];

    public function daira(){
        return $this->hasMany(Daira::class, 'wilaya_id', 'id');
    }
}
