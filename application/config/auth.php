<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'driver'       => 'ORM',
	'hash_method'  => 'sha1',
	'salt_pattern' => '3, 5, 8, 10, 12, 13, 17, 20, 25, 28',
	'lifetime'     => 1209600,
	'session_key'  => 'auth_user',
);
