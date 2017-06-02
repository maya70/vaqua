<?php
/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/22/2017
 * Time: 6:27 PM
 */
function createSelected()
{

}
$sdata = array();

$titles = $_POST['titles'];

foreach ($_POST['rdata'] as $key=>$val)
{
    $flag = true;
    for ($i = 0 ; $i<count($titles); $i++) {
        if (!($val[$titles[$i]] >= $_POST['sdata'][$titles[$i]][0] && $val[$titles[$i]] <= $_POST['sdata'][$titles[$i]][1]))
           $flag = false;
    }
    if ($flag)
        array_push($sdata, $val);
}
//print_r($sdata);
$fp = fopen('../uploads/temp.json', 'w');
fwrite($fp, json_encode($sdata));
fclose($fp);