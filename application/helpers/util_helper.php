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
    $udate =date("d/m/Y h:m:s",$date);
    return $udate;
}

function phoneNoFormat($phone){
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

function timeFormatAmPm($time){

    $date=date('d-m-y');
    $dateTime=strtotime($date.' '.$time);
    return date("h:i A",$dateTime);
}



function wordLimit($text,$n=10){
    $text=strip_tags($text);  // not neccssary for none HTML
// $text=strip_shortcodes($text); // uncomment only inside wordpress system
    $text = trim(preg_replace("/\s+/"," ",$text));
    $word_array = explode(" ", $text);
    if (count($word_array) <= $n)
        return implode(" ",$word_array);
    else
    {
        $text='';
        foreach ($word_array as $length=>$word)
        {
            $text.=$word ;
            if($length==$n) break;
            else $text.=" ";
        }
    }
    if(count($word_array) > $n ){
        return $text."...";
    }else{
        return $text;
    }
}

?>
