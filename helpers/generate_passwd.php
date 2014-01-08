<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/29/13
 * Time: 11:10 PM
 * To change this template use File | Settings | File Templates.
 */
function generate_password ($length = 8) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
	$count = strlen($chars);
	for ($i = 0, $result = ''; $i < $length; $i++) {
		$index = rand(0, $count - 1);
		$result .= substr($chars, $index, 1);
	}
	$passwd_with_salt = "{sha1}" . base64_encode(sha1($result, true));
	return array('passwd' => $result, 'passwd_with_salt' => $passwd_with_salt);
}