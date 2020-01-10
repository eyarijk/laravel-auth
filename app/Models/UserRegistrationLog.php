<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRegistrationLog
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property \DateTime registered_at
 */
class UserRegistrationLog extends Model
{
    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $casts = [
        'registered_at' => 'datetime'
    ];
}
