<?php echo $header ?>
<h2>Your Settings</h2>
User - <?php echo html::chars($user->name()) ?><br/>
<?php
	if(isset($errors)) {
		echo '<pre>';
		var_dump($errors);
		echo '</pre>';
	}
	echo form::open();
	echo '<ul class="reg">';
	echo '<li>',form::label('firstname','First Name'),
		form::input('firstname',$user->firstname,array('class'=>'text')),'</li>';
	echo '<li>',form::label('lastname','Last Name'),
		form::input('lastname',$user->lastname,array('class'=>'text')),'</li>';
	echo '<li>',form::label('email','Email'),
		form::input('email',$user->email,array('class'=>'text')), 'Verified: ',$user->email_verified,'</li>';
        echo '<li>',form::label('password','Password'),' ',
		form::password('password','',array('autocomplete'=>'off')),'</li>';
        echo '<li>',form::label('password2','Confirm Password'),' ',
		form::password('password2','',array('autocomplete'=>'off')),'</li>';

	echo '<li>',form::submit('s','Submit'),'</li>';
	echo '</ul>';
	echo form::close();
?>

<?php echo $footer ?>
