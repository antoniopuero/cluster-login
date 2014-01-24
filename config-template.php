<?php
$base_address = "http://your.site.com/";
$base_dn = "ou=people,dc=example,dc=basic,dc=ua";
$path_to_request = "./request.php";
$path_to_index = "./index.php";
$path_to_confirm = "./confirm.php";
$path_to_captcha = "./kcaptcha/index.php";
$helpers = "./helpers/";
$pre_query_folder = "./pre-query/";
$query_folder = "./users-query/";
$cluster_email = "ex@ex.ua";
$reply_to_whom = "ex@ex.ua";
include('./ldap-config.php');