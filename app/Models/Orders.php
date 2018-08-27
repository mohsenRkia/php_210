<?php

namespace App\Models;

use App\Helper\DateConverter;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = ["id"];

    use DateConverter;

    public function places()
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
