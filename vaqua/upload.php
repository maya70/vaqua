<?php
require_once QA_BASE_DIR . 'qa-include/qa-db.php';
require_once __DIR__ .'/vaqua_utilities.php';

function make_conf_file($file_name)
{
    $base_path = getBasePath();

    $url = $base_path . $file_name;

        $jsonObj = array(
            "data" => array("url" => "../../$url"),
            "mark" => "bar",
            "encoding" => array(
                "x" => array("field" => "x", "type" => "ordinal"),
                "y" => array("aggregate" => "mean", "field" => "y", "type" => "quantitative")
            )
        );


    $fp = fopen($base_path . '/conf.json', 'w');
    fwrite($fp, json_encode($jsonObj));
    fclose($fp);
}



function getBasePath()
{
    $post_id = v_get_last_inserted_id(); /// return last post id for posts

    $base_path = make_directory("uploads/" . $post_id . "/");
    return $base_path;
}

function uploadFile($filename)
{
    $target_file = getBasePath() . basename($filename['name']);
    $uploadOk = 1;
// Check file size
    if ($filename["size"] > 8388608) {
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return false;
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($filename["tmp_name"], $target_file)) {
            make_conf_file(basename($filename['name']));
        } else {
            return false;
        }
    }
    return $target_file;
}

?>
