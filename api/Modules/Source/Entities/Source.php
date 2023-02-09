<?php

namespace Modules\Source\Entities;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Source\Entities\TypeSource;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Source\Database\factories\SourceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Source extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];


    public function getAvatarAttribute($value)
    {
        if (Str::startsWith($value, 'http')) {
            return $value;
        } elseif (file_exists(public_path('images/sources/' . $value)) && !empty($value)) {
            return asset('public/images/sources/' . $value);
        } else {
            return asset('public/404.png');
        }
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
