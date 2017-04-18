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
    $flag = false;
    foreach ($jsonIterator as $key => $val) {


        if(!is_array($val)) {
            if(!array_key_exists($key,$attributes))
                $attributes[$key]='';
            $attributes[$key] =mapToRightType($attributes[$key],getAvailabletype(gettype($val),$val));
        }
    }
    return $attributes;
}

function isDate($value)
{
    if (!$value) {
        return false;
    }

    try {
        new \DateTime($value);
        return true;
    } catch (\Exception $e) {
        return false;
    }
}

function preprocssing($key,$val)
{
    $key = strtolower($key);
    if($key == 'integer')
    {
        return isQauntitative($key);
    }
    else if($key =='string')
    {
        return (isDate($val))? 'date':'string';
    }
    else
        return $key;
}
function isQauntitative($val)
{
    $counter = 0;
    while($val>0)
    {
        $val = $val/10;
        $counter++;
    }
    return($counter>6)?'double':'integer';
}
function getAvailabletype($key,$val)
{

    $res = preprocssing($key,$val);
    $type = array
    (
        'string' =>"nominal",
        'integer' =>"ordinal",
        'double' =>"quantitative",
        'date' =>"temporal",
        'null' => 'null',
    );

    return $type[$res];
}

function mapToRightType($oldVal,$newVal)//
{

    $priorityMap = array(
        "nominal" =>1,
        "quantitative"=>2,
        "ordinal"=>3,
        "temporal"=>4,
        'null'=>5,
        '' =>10
    );
    if($priorityMap[$oldVal]>$priorityMap[$newVal])
        return $newVal;
    else
        return $oldVal;
}