<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/14/13
 * Time: 11:38 AM
 * To change this template use File | Settings | File Templates.
 */
include('./read_directory.php');
function user_exists ($login, $pre_query_dir) {
    $files = files_in_directory($pre_query_dir);
    foreach($files as $filename) {
        if ($login == explode('+', $filename)[0]) {
            return true;
        }
    }
}