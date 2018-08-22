<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = ["id"];
    public function places()
    {
        return $this->hasMany(Places::class);
    }
}
