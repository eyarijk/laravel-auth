<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @property int id
 * @property string name
 * @property string email
 * @property \DateTime|null email_verified_at
 * @property string password
 * @property string|null created_at
 * @property string|null updated_at
 * @property UserRegistrationLog registrationLog
 */
class User extends Authenticatable implements MustVerifyEmail
{
    /**
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasOne
     */
    public function registrationLog(): HasOne
    {
        return $this->hasOne(UserRegistrationLog::class,'user_id','id');
    }
}
