<?php

namespace App;

use App\Models\Orders;
use App\Models\Places;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
