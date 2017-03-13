<?php

require_once QA_BASE_DIR.'vaqua/upload.php';

function v_get_file_path(){
    if(isset($_FILES['upload']) && !empty($_FILES['upload']['name'])){
        return uploadFile($_FILES['upload']);
    }
    else{
        return false;
    }
}