<?php

return array(
        // Change 'field' to the name of the actual field (e.g., 'email').
	'firstname' => array(
		'not_empty'	=> 'Your First Name cannot be blank.',
		'max_length'	=> 'Your First Name must be between 1 and 10 charecters long.',
		'default'	=> 'Invalid Input.',
	),
	'lastname' => array(
		'not_empty'	=> 'Your Last Name cannot be blank.',
		'max_length'	=> 'Your Last Name must be between 1 and 10 charecters long.',
		'default'	=> 'Invalid Input.',
	),
	'email' => array(
		'not_empty'	=> 'Your email cannot be blank.',
		'email'		=> 'Your email does not look valid.',
		'max_length'	=> 'Your email must be less then 128 charecters long.',
		'email_exists'	=> 'Someone is already using that email address.',
		'default'	=> 'Invalid Input.',
	),
	'password' => array(
		'not_empty'	=> 'Your Password cannot be blank.',
		'min_length'	=> 'Your Password must be atleast 3 charecters long.',
		'max_length'	=> 'Your Password must be less then 40 charecters long.',
		'matches'	=> 'Your Passwords did not match.',
		'default'	=> 'Invalid Input.',
	),
);
