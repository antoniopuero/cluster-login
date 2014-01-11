<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/31/13
 * Time: 1:49 PM
 * To change this template use File | Settings | File Templates.
 */
$folder = "../pre-query";
$files = glob($folder . "/*"); // get all file names
foreach($files as $file){ // iterate files
	if(is_file($file))
		unlink($file); // delete file
}