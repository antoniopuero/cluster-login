<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/14/13
 * Time: 11:38 AM
 * To change this template use File | Settings | File Templates.
 */
include('./read_directory.php');
function user_exists($login, $pre_query_dir, $query_dir)
{
    $files = files_in_directory($pre_query_dir);
    if (!!$files) {
        foreach ($files as $filename) {
            $used_login = explode('+', $filename);
            if ($login == $used_login[0]) {
                return true;
            }
        }
    }
    $files = files_in_directory($query_dir);
    if (!!$files) {
        foreach ($files as $filename) {
            $used_login = explode('+', $filename);
            if ($login == $used_login[0]) {
                return true;
            }
        }
    }
    return false;
}