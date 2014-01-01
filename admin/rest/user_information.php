<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/31/13
 * Time: 1:46 PM
 * To change this template use File | Settings | File Templates.
 */
include("../config.php");
$file = $_POST['filename'];
$content = file_get_contents($query_folder . "/" . $file);
echo $content;