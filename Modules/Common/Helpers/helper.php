<?php


use Illuminate\Support\Facades\Request;
use Morilog\Jalali\Jalalian;

/**
 *  active sidebar dynamically
 * @param $routeName
 * @return bool
 */

function isActiveRouteSidebar($routeName)
{
    return Request::routeIs($routeName);
}


/**
 * convert of the date to Jalali
 *
 * @param $date
 * @param $format
 * @return string
 */
function setDateToJalali($date, $format): string
{
    // TODO: set default format to arguments
    return Jalalian::forge($date)->format($format);
}
