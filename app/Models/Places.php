<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasOne(Orders::class);
    }
}
