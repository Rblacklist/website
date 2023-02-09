<?php

namespace Modules\User\Entities;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Modules\User\Database\factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\User\Notifications\MailResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $guarded  = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function getAvatarAttribute($value)
    {
        if (Str::startsWith($value, 'http')) {
            return $value;
        } elseif (file_exists(public_path('images/users/' . $value)) && !empty($value)) {
            return asset('public/images/users/' . $value);
        } else {
            return asset('public/404.png');
        }
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token));
    }

    //--------------------------Factory--------------------------------------
    public static function newFactory()
    {
        return new UserFactory;
    }

    // -----------------------------Scopes---------------------------------------
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
