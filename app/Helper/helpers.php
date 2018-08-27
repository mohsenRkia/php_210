<?php

function toJalali($date){


    $dateArray = explode('-',$date);

    $year = $dateArray[0];
    $month = $dateArray[1];
    $day = $dateArray[2];

  $convert =  \Morilog\Jalali\jDateTime::toJalali((int)$year,(int)$month,(int)$day); // [1395, 2, 18]

    $convert = "$convert[0]/$convert[1]/$convert[2]";
    return $convert;
}

function timeStampstoJalali($timestamps){
    $jalali = $date = \jDate::forge($timestamps)->format('%B %d، %Y'); // دی 02، 1391
    return $jalali;
}