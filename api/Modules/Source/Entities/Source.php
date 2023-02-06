<?php

namespace Modules\Source\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Source\Entities\TypeSource;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Source\Database\factories\SourceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Source extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // -----------------------------Relations---------------------------------------
    public function typeSource(){
        return $this->belongsTo(TypeSource::class, 'type_source_id', 'id');
    }



    //------------------------Factory--------------------------------
    public static function  newFactory()
    {
        return new SourceFactory();
    }

    // -----------------------------Scopes---------------------------------------
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
