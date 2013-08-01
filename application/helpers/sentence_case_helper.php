<?php

function sentence_case($words, $charList = null) {
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

function order_status_class($code){
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

?>