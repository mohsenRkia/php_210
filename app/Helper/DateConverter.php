<?php
/**
 * Created by PhpStorm.
 * User: l
 * Date: 26/08/2018
 * Time: 10:47 PM
 */

namespace App\Helper;


trait DateConverter
{
    public function getCheckinAttribute($value)
    {
        return toJalali($value);
    }

    public function getCheckoutAttribute($value)
    {
        return toJalali($value);
    }

}