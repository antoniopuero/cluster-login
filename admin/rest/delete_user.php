<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/31/13
 * Time: 1:47 PM
 * To change this template use File | Settings | File Templates.
 */

include("../config.php");

unlink($query_folder . "/" . $_POST['filename']);
echo "OK";