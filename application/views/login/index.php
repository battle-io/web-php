<?php
echo View::factory('common/header')
        ->set('title','Login');
?>
<?php
	if(isset($message)) {
		print_r($message);
	}
	echo form::open();
        echo '<ul>';
        echo '<li>',form::label('email','Email'),' ',form::input('email'),'</li>';
        echo '<li>',form::label('password','Password'),' ',form::password('password'),'</li>';
        echo '<li>',form::submit('l','Login'),'</li>';
	echo '<li>',html::anchor('login/recover_request','Forgot your password?'),'</li>';
        echo '</ul>';
	echo form::close();
?>
<?php
echo View::factory('common/footer')
?>
