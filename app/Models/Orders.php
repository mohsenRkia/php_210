<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function place()
    {
        return $this->belongsTo(Places::class);
    }

    public function costumer()
    {
        return $this->belongsTo(Costumers::class);
    }

    public function guests()
    {
        return $this->hasMany(Guests::class);
    }
}
