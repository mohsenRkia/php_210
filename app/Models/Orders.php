<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = ["id"];
    public function place()
    {
        return $this->belongsTo(Places::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guests()
    {
        return $this->hasMany(Guests::class);
    }
}
