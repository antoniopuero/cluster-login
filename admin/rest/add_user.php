<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/31/13
 * Time: 1:46 PM
 * To change this template use File | Settings | File Templates.
 */
include("../config.php");
include("../../ldap-config.php");
include($helpers . "generate_passwd.php");
include($helpers . "send_email_to_user.php");
session_start();
//$connection = ldap_connect($ldaphost, $ldapport);
//	if ($connection) {
//		ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
//		$ldap_bind = ldap_bind($connection, $_SESSION['ldaprdn'], $_SESSION['passwd']);
//		if ($ldap_bind) {
//			$info = ldap_search($connection, "o=Cluster,c=US", "(ou=Groups)", array("gid"));
//			$gids = ldap_get_entries($connection, $info);
//			for ($i = 0, $max = 0; $i < $gids['count']; $i++) {
//				$temp = $gids[$i]['gid'];
//				if (($temp > 1000) && ($temp < 5000) && ($temp > $max)) {
//					$max = $temp;
//				}
//			}
			$max = 1001; //This must be deleted
			$content = file_get_contents($query_folder . "/" . $_POST['filename']);
			$decoded = array_diff_key(json_decode($content, true), array('captcha' => '', 'hidden_lang' => ''));

			$group_rdn = "cn=" . $decoded['login'] . ",ou=Groups," . $dc;
			$person_rdn = "cn=" . $decoded['login'] . ",ou=User," . $dc;

			$group = array_diff_key($decoded, array('firstname' => '', 'lastname' => ''));
			$group['cn'] = $decoded['firstname'] . " " . $decoded['lastname'];
			$group['objectClass'] = array('posixUser', 'person');
			$password = generate_password($password_length);
			$group["passwd"] = $password['passwd_with_salt'];

			$person = array_diff($group, array());
			$group['gid'] = $max;
			$person['uid'] = $max;

//			ldap_add($connection, $group_rdn, $group);
//			ldap_add($connection, $person_rdn, $group);
//			send_email_to_user($decoded['mail'], $decoded['login'], $decoded['firstname'] . " " . $decoded['lastname'], $password['passwd']);

			print_r($person);
//		}
//	}
//ldap_close($connection);
//unlink($query_folder . "/" . $_POST['filename']);
echo "OK";