<?php

use Carbon\Carbon;

if (!function_exists('formatMyDate')) {
    function formatMyDate($date, $format = 'd M Y - h:i A')
    {
        return Carbon::parse($date)->format($format);
    }
}

if (!function_exists('slice_my_string')) {
    function limit_my_string($string, $maxLength = 20)
    {
        return str()->limit($string, $maxLength);
    }
}
