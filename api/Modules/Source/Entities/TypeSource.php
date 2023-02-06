<?php

namespace Modules\Source\Entities;

use Modules\Source\Entities\Source;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Source\Database\factories\TypeSourceFactory;

class TypeSource extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


     // -----------------------------Relations---------------------------------------

    public function sources(){
        return $this->hasMany(Source::class, 'type_source_id', 'id');
    }

    public static function newFactory(){
        return new TypeSourceFactory();
    }

    // -----------------------------Scopes---------------------------------------
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

}
