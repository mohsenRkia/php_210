<?php

namespace App\Models;

use App\Helper\TimeStampsConverter;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = ["id"];
    use TimeStampsConverter;
    public function places()
    {
        return $this->hasMany(Places::class);
    }
}
