<?php
	include('../config.php');
	function send_email_to_user ($email, $login, $username, $passwd) {
		$body = "Dear " . $username . "!
			Your application for user account registration at IFBG cluster has been approved.

			Interactive user interface server is accessible via SSH protocol.

			  Server hostname:     grid.ifbg.org.ua
			  RSA key fingerprint: c5:d1:43:4f:47:1e:13:f1:77:55:c5:31:f4:ae:eb:d6

			Please verify this fingerprint to make sure you are connecting to a legitimate server.

			Please use the following credentials to log in:

			  login    : ". $login ."
			  password : ". $passwd ."

			Note: You may change your password by issuing 'passwd' command after logon.

			Note: SSH key-based authentication method is preferred over password authentication.

			Please, make sure you have read and agree to cluster usage policy.
			  http://grid.ifbg.org.ua/wiki/Policy

			With Best Regards,
			  IFBG Cluster Team
			";
		mail($email, "IFBG cluster user account application approved",
			$body,
			"From: ". $cluster_email ."\r\n"
			. "Reply-To: ". $reply_to_whom ."\r\n"
			. "Content-type: text/plain\r\n"
			. "X-Mailer: PHP/" . phpversion());
	}