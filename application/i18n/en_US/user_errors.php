<?php

$lang = array(
        // Change 'field' to the name of the actual field (e.g., 'email').
	'firstname' => array(
		'required'	=> 'Your First Name cannot be blank.',
		'length'	=> 'Your First Name must be between 1 and 10 charecters long.',
		'default'	=> 'Invalid Input.',
	),
	'lastname' => array(
		'required'	=> 'Your Last Name cannot be blank.',
		'length'	=> 'Your Last Name must be between 1 and 10 charecters long.',
		'default'	=> 'Invalid Input.',
	),
	'email' => array(
		'required'	=> 'Your email cannot be blank.',
		'email'		=> 'Your email does not look valid.',
		'length'	=> 'Your email must be less then 128 charecters long.',
		'email_exists'	=> 'Someone is already using that email address.',
		'default'	=> 'Invalid Input.',
	),
	'password' => array(
		'required'	=> 'Your Password cannot be blank.',
		'length'	=> 'Your Password must be atleast 3 charecters long.',
		'matches'	=> 'Your Passwords did not match.',
		'default'	=> 'Invalid Input.',
	),
	'gender' => array(
		'required'	=> 'Your Password cannot be blank.',
		'bad_gender'	=> 'You somehow selected an invalid gender.',
		'default'	=> 'Invalid Input.',
	),
);
