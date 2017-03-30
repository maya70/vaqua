<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 3/29/2017
 * Time: 2:09 PM
 */


if (isset($_FILES["file"])) {
    require_once __DIR__ . '/../../../vaqua/upload.php';
    session_start();

    //die($_SESSION['qid']);
   uploadFile($_FILES["file"],$_SESSION['qid']);

    echo explode(".",$_FILES['file']['name'])[0];


}