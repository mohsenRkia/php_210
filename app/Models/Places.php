<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function costumer()
    {
        return $this->belongsTo(Costumers::class);
    }

    public function order()
    {
        return $this->hasOne(Orders::class);
    }
}
