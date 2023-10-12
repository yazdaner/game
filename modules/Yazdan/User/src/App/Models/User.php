<?php

namespace Yazdan\User\App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Game\App\Models\Group;
use Yazdan\Game\App\Models\Record;
use Yazdan\Media\App\Models\Media;
use Yazdan\User\App\Notifications\ResetPasswordEmailCodeNotification;
use Yazdan\User\App\Notifications\VerifyMailNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'mobile',
        'key',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function avatar()
    {
        return $this->belongsTo(Media::class, 'avatar_id');
    }


    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyMailNotification());
    }

    public function sendResetPasswordEmailCodeNotification()
    {
        $this->notify(new ResetPasswordEmailCodeNotification());
    }

    public function getVerifyAttribute()
    {
        return $this->hasVerifiedEmail() ? 'تایید شده' : 'تایید نشده';
    }

    public function getVerifyStyleAttribute()
    {
        return $this->hasVerifiedEmail() ? 'text-success' : 'text-error';
    }


    public function profilePath()
    {
        return $this->username ? route('users.showProfile', $this->username) : route('users.showProfile', 'username');
    }

    public function getAvatar($size = 'original')
    {
        if (isset($this->avatar_id)) {
            return $this->avatar->thumb($size);
        } else {
            return asset('img/profile.jpg');
        }
    }


    public function records()
    {
        return $this->hasMany(Record::class, 'user_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user', 'user_id', 'group_id');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class,'coupon_user')->withPivot('count');
    }
}
