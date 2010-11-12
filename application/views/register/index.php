<?php
echo View::factory('common/header')
        ->set('title','Register');
?>

<?php
	if(isset($errors)) {
		echo '<pre>';
		var_dump($errors);
		echo '</pre>';
	}
	echo form::open();
	echo '<ul class="reg">';
	echo '<li>',form::label('firstname','First Name'),form::input('firstname','',array('class'=>'text')),'</li>';
	echo '<li>',form::label('lastname','Last Name'),form::input('lastname','',array('class'=>'text')),'</li>';
	echo '<li>',form::label('email','Email'),form::input('email','',array('class'=>'text')),'</li>';
	echo '<li>',form::label('password','Password'),form::password('password','',array('class'=>'text')),'</li>';
	echo '<li>',form::label('password2','Confirm Password'),form::password('password2','',array('class'=>'text')),'</li>';
	echo '<li>',form::submit('j','Join'),'</li>';
	echo '</ul>';
	echo form::close();
?>
<?php
echo View::factory('common/footer');
?>
