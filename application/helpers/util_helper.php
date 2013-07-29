<?php

function sentenceCase($words, $charList = null) {
    // Use ucwords if no delimiters are given
    if (!isset($charList)) {
        return ucwords($words);
    }

    // Go through all characters
    $capitalizeNext = true;

    for ($i = 0, $max = strlen($words); $i < $max; $i++) {
        if (strpos($charList, $words[$i]) !== false) {
            $capitalizeNext = true;
        } else if ($capitalizeNext) {
            $capitalizeNext = false;
            $words[$i] = strtoupper($words[$i]);
        }
    }

    return $words;
}

function orderStatusClass($code){
    switch($code){
        case $code:
            $class = 'estimate';
            break;
        case $code:
            $class = 'inproduction';
            break;
        case $code:
            $class = 'ready';
            break;
        case $code:
            $class = 'sold';
            break;
    }
}

function dateFormat($date=NULL){

    $mdate =strtotime($date);
    $udate =date("d/m/Y",$mdate);
    return $udate;
}

function dateFormatStr($date=NULL){
    $udate =date("d/m/Y",$date);
    return $udate;
}

function phoneNoFormat(){
    return  $to = sprintf("%s-%s-%s",
        substr($phone, 0, 3),
        substr($phone, 3, 3),
        substr($phone, 6, 8));
}

function timeFormat($time){

    $date=date('d-m-y');
    $dateTime=strtotime($date.' '.$time);
    return date("H:i",$dateTime);
}

?>
