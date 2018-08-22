<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costumers extends Model
{
    public function places()
    {
        return $this->hasMany(Places::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
