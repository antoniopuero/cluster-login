<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 1/11/14
 * Time: 11:33 PM
 * To change this template use File | Settings | File Templates.
 */
function email_is_in_use ($email, $ldaphost, $ldapport, $base_dn) {

	$connection = ldap_connect($ldaphost, $ldapport);
	if ($connection) {
		ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
		$info = ldap_search($connection, $base_dn, "(cn=*)", array('mail'));
		$emails = ldap_get_entries($connection, $info);
		for ($i = 0; $i < $emails['count']; $i++) {
			if (isset($emails[$i]['mail'])) {
				$temp = $emails[$i]['mail'][0];
				if ($email == $temp) {
					ldap_close($connection);
					return true;
				}
			}
		}
	}
}