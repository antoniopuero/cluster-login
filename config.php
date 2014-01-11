<?php
$base_address = "http://ldap-dev.cluster.univ.kiev.ua/";
$base_dn = "dc=cluster,dc=univ,dc=kiev,dc=ua";
$path_to_request = "./request.php";
$path_to_index = "./index.php";
$path_to_confirm = "./confirm.php";
$path_to_captcha = "./kcaptcha/index.php";
$helpers = "./helpers/";
$pre_query_folder = "./pre-query/";
$query_folder = "./users-query/";
$cluster_email = "cluster@cluter.ua";
$reply_to_whom = "cluster@cluter.ua";
include('./ldap-config.php');