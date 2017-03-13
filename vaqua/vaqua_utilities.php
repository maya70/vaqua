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