<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getValueAttribute($value)
    {
        if ($this->key === 'logo') {
            return asset('public/images/logo/') . '/' . $value;
        }

        if ($this->key === 'favicon') {
            return asset('public/images/favicon/') . '/' . $value;
        }
        return $value;
    }
}
