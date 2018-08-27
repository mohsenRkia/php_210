<?php

namespace App;

use App\Helper\TimeStampsConverter;
use App\Models\Orders;
use App\Models\Places;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use TimeStampsConverter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function places()
    {
        return $this->hasMany(Places::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
