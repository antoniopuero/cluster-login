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
$connection = ldap_connect($ldaphost, $ldapport);
	if ($connection) {
		ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
		$ldap_bind = ldap_bind($connection, $_SESSION['ldaprdn'], $_SESSION['passwd']);
		if ($ldap_bind) {
			$info = ldap_search($connection, $_SESSION['ldaprdn'], "(cn=*)");
			$gids = ldap_get_entries($connection, $info);
//			print_r($gids);
			for ($i = 0, $max = 1000; $i < $gids['count']; $i++) {
				if (isset($gids[$i]['uidnumber'])) {
					$temp = $gids[$i]['uidnumber'][0];
					if (isset($temp) && ($temp < 5000) && ($temp > $max)) {
						$max = $temp;
					}
				}
			}
			$max += 1;
			$content = file_get_contents($query_folder . "/" . $_POST['filename']);
			$decoded = array_diff_key(json_decode($content, true), array('captcha' => '', 'hidden_lang' => ''));

            $password = generate_password($password_length);

			$group_rdn = "cn=" . $decoded['login'] . ",ou=groups," . $base_dn;
			$person_rdn = "uid=" . $decoded['login'] . ",ou=people," . $base_dn;
            $person = array();
            $person['uid'] = $decoded['login'];
            $person['displayName'] = $decoded['login'];
            $person['givenName'] = $decoded['firstname'];
            $person['sn'] = $decoded['middlename'];
			$person['cn'] = $decoded['firstname'] . " " . $decoded['lastname'];
			$person['gecos'] = $decoded['firstname'] . " " . $decoded['lastname'];
			$person['objectClass'] = array('inetOrgPerson', 'posixAccount', 'shadowAccount', 'person', 'top');
            $person['uidNumber'] = $max;
            $person['gidNumber'] = $max;
            $person['userPassword'] = $password['passwd_with_salt'];
            $person['loginShell'] = '/bin/bash';
            $person['homeDirectory'] = '/home/' . $decoded['login'];
            $person['shadowExpire'] = -1;
            $person['shadowFlag'] = 0;
            $person['shadowWarning'] = 7;
            $person['shadowMin'] = 0;
            $person['shadowMax'] = 99999;
            $person['shadowLastChange'] = 16049;
            $person['mail'] = $decoded['mail'];
            $person['telephoneNumber'] = $decoded['phone'];
            $person['businessCategory'] = $decoded['post'];
            $person['o'] = $decoded['organization'];
            $person['ou'] = $decoded['department'];
            $person['description'] = $decoded['resource'] . " " . $decoded["class"];

            $group = array();
            $group['objectClass'] = array('posixGroup');
            $group['cn'] = $decoded['login'];
			$group['gidNumber'] = $max;

			ldap_add($connection, $group_rdn, $group);
			ldap_add($connection, $person_rdn, $person);
			send_email_to_user($decoded['mail'], $decoded['login'], $decoded['firstname'] . " " . $decoded['lastname'], $password['passwd'], $cluster_email, $reply_to_whom);
		}
	}
ldap_close($connection);
unlink($query_folder . "/" . $_POST['filename']);
echo "OK";