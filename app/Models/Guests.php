<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    protected $guarded = ["id"];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
