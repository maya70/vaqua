<?php
require_once QA_BASE_DIR . 'qa-include/qa-db.php';
require_once __DIR__ .'/vaqua_utilities.php';

function make_conf_file($file_name, $attributes)
{
    $base_path = getBasePath();

    $url = $base_path . $file_name;

    $encoArray = array();

    $i = 0;
    $fields = ["x", "y"];
    foreach ($attributes as $key){
        $val = array("field" => $key, "type" => "ordinal");

        $encoArray[$fields[$i++]] = $val;
    }

        $jsonObj = array(
            "data" => array("url" => "../../$url"),
            "mark" => "bar",
            "encoding" => $encoArray
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
            $attributes = get_json_Attributes($target_file);
            make_conf_file(basename($filename['name']), $attributes);
        } else {
            return false;
        }
    }
    return $target_file;
}

?>
