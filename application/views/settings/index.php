<?php echo $header ?>
<h2>Your Settings</h2>
User - <?php echo html::specialchars($user->name()) ?><br/>
<?php
	if(isset($errors)) {
		echo '<pre>';
		var_dump($errors);
		echo '</pre>';
	}
	echo form::open();
	echo '<ul class="reg">';
	echo '<li>',form::label('firstname','First Name'),
		form::input('firstname',$user->firstname,'class="text"'),'</li>';
	echo '<li>',form::label('lastname','Last Name'),
		form::input('lastname',$user->lastname,'class="text"'),'</li>';
	echo '<li>',form::label('email','Email'),
		form::input('email',$user->email,'class="text"'), 'Verified: ',$user->email_verified,'</li>';
        echo '<li>',form::label('password','Password'),' ',
		form::password('password','','autocomplete="off"'),'</li>';
        echo '<li>',form::label('password2','Confirm Password'),' ',
		form::password('password2','','autocomplete="off"'),'</li>';

	echo '<li>',form::label(),form::submit('s','Submit'),'</li>';
	echo '</ul>';
	echo form::close();
?>

<?php echo $footer ?>
