<?php
/**
 * Created by PhpStorm.
 * User: elfeky
 * Date: 07/03/2017
 * Time: 04:46 م
 */


function make_directory($path_to_directory)
{
    if (!file_exists($path_to_directory)) {
        mkdir($path_to_directory, 0777, true);

        return $path_to_directory;
    }

    return $path_to_directory;
}


function get_json_Attributes($file){
    $str = file_get_contents($file);
    return json_parse($str);
}


function json_parse($json){
    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($json, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);

    $attributes = array();
    $firstArray = 0;
    foreach ($jsonIterator as $key => $val) {

        if ($firstArray == 2){
            break;
        }

        if(is_array($val)) {
            $firstArray++;
        } else {
            array_push($attributes,$key);
        }
    }
    return $attributes;
}