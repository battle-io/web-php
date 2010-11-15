<?php

return array(
        // Change 'field' to the name of the actual field (e.g., 'email').
	'email' => array(
		'required'	=> 'Your email cannot be blank.',
		'email'		=> 'Your email does not look valid.',
		'default'	=> 'Invalid Input.',
	),
	'password' => array(
		'required'	=> 'Your Password cannot be blank.',
		'default'	=> 'Invalid Input.',
	),
	'key' => array(
		'required'	=> 'Missing the key.',
		'alpha_numeric'	=> 'There is something wrong with the recovery key',
		'default'	=> 'Invalid Input.',
	),
);
