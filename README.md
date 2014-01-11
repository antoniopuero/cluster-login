Dependencies:
=============
-php-gd library

pre-query and users-query folders must have correct rights for reading and writing

set configs in root folder: `config.php` and `ldap-config.php`; and in admin folder: `admin/config.php`
`admin/config.php` should be created. It must contains:
```php
<?php
	$base_dn = "dc=basic,dc=example,dc=org";
	$query_folder = "../../pre-query";
	$helpers = "../../helpers/";
	$password_length = 6; // optional
	$gid_ranges = array(1000, 5000);
	$cluster_email = "email@email.ua";
	$reply_to_whom = "email@email.ua";