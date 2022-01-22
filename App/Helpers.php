<?php

/**
 * @param $date
 *
 * @return string
 */
function timeAgo($date){
    return \Carbon\Carbon::parse ($date)->diffForHumans ();
}

