<?php echo $header ?>

<?php
	if(isset($errors)) {
		echo '<pre>';
		var_dump($errors);
		echo '</pre>';
	}
	echo form::open();
	echo '<ul class="reg">';
	echo '<li>',form::label('firstname','First Name'),form::input('firstname','','class="text"'),'</li>';
	echo '<li>',form::label('lastname','Last Name'),form::input('lastname','','class="text"'),'</li>';
	echo '<li>',form::label('email','Email'),form::input('email','','class="text"'),'</li>';
	echo '<li>',form::label('password','Password'),form::password('password','','class="text"'),'</li>';
	echo '<li>',form::label('password2','Confirm Password'),form::password('password2','','class="text"'),'</li>';
	echo '<li>',form::label(),form::submit('j','Join'),'</li>';
	echo '</ul>';
	echo form::close();
?>
<?php echo $footer ?>
