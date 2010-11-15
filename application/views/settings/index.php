<?php
echo View::factory('common/header')
        ->set('title','Home');
?>
<h3>Your Settings</h3>
User - <?php echo html::chars($user->name()) ?><br/>
<?php
	if($message !== false) {
		echo '<h2>',html::chars($message),'</h2>';
	}
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
		form::input('email',$user->email,array('class'=>'text')), ' ';
	if($user->email_verified == 'True') {
		echo 'You have verified this email address';
	} else {
		echo 'You have not verified this email addres ',
			html::anchor('settings/re_verify','Resend Confirmation email');
	}
	echo '</li>';

        echo '<li>',form::label('password','Password'),' ',
		form::password('password','',array('autocomplete'=>'off')),'</li>';
        echo '<li>',form::label('password2','Confirm Password'),' ',
		form::password('password2','',array('autocomplete'=>'off')),'</li>';
	echo '<li>',form::label('key','Bot Key'),' ',
		form::input('key',$user->key,array('class'=>'text')),'</li>';

	echo '<li>',form::submit('s','Submit'),'</li>';
	echo '</ul>';
	echo form::close();
?>

<?php
echo View::factory('common/footer');
