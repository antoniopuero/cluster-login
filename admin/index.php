<?php
session_start();
$_SESSION['login']=false;

include('./config.php');

if (isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['passwd']) && $_POST['passwd'] != "") {
//	$connection = ldap_connect($ldaphost, $ldapport);
//	$ldaprdn = "cn=" . $_POST['username'] . "," . $dc;
//	if ($connection) {
//		$ldap_bind = ldap_bind($connection, $ldaprdn, $_POST['passwd']);
//		if ($ldap_bind) {
			$_SESSION['login'] = true;
//			$_SESSION['ldaprdn'] = $ldaprdn;
//			$_SESSION['passwd'] = $_POST['passwd'];
			$_SESSION['last_time'] = time();
			header('Location: ./admin.php');
//		}
//	}
//ldap_close($connection);
}
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/bootstrap-responsive.min.css">
</head>
<body>
	<style>
		html, body {
			width: 100%;
		}
		.margin-body {
			margin-top: 100px;
		}
		.margin-body label {
			text-align: right;
		}
	</style>
	<div class="span4 offset4 margin-body">
		<form class="form-actions" method="POST">
			<label for="username">CN: <input id="username" class="large" name="username"></label>
			<label for="passwd">Password: <input id="passwd" class="large" name="passwd"></label>
			<input type="submit" class="btn btn-block btn-info">
		</form>
	</div>



	<script src="./js/jquery-1.7.1.js"></script>
	<script src="./js/bootstrap.min.js"></script>
</body>
</html>