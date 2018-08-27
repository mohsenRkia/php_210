<?php
/**
 * Created by PhpStorm.
 * User: l
 * Date: 27/08/2018
 * Time: 07:26 PM
 */

namespace App\Helper;


trait TimeStampsConverter
{
    public function getCreatedAtAttribute($timestamps)
    {
        return timeStampsToJalali($timestamps);
    }

    public function getUpdatedAtAttribute($timestamps)
    {
        return timeStampsToJalali($timestamps);
    }
}