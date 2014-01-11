<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/14/13
 * Time: 11:38 AM
 * To change this template use File | Settings | File Templates.
 */
function user_exists($login, $pre_query_dir, $query_dir, $ldaphost, $ldapport, $base_dn) {
    $files = files_in_directory($pre_query_dir);
    if (!!$files) {
        foreach ($files as $filename) {
            $used_login = explode('+', $filename);
            if ($login == $used_login[0]) {
                return true;
            }
        }
    }
    $files = files_in_directory($query_dir);
    if (!!$files) {
        foreach ($files as $filename) {
            $used_login = explode('+', $filename);
            if ($login == $used_login[0]) {
                return true;
            }
        }
    }
	$connection = ldap_connect($ldaphost, $ldapport);
	if ($connection) {
		ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
		$info = ldap_search($connection, $base_dn, "(cn=*)");
		$logins = ldap_get_entries($connection, $info);
		for ($i = 0; $i < $logins['count']; $i++) {
			if (isset($logins[$i]['uid'])) {
				$temp = $logins[$i]['uid'][0];
				if ($login == $temp) {
					ldap_close($connection);
					return true;
				}
			}
		}
	}
    return false;
}