<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
