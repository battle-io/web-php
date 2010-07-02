<?php echo $header ?>
<h2>Change Your Password</h2>
<?php
	if(isset($errors)) {
		echo '<pre>';
		var_dump($errors);
		echo '</pre>';
	}
	echo form::open();
        echo '<ul>';
        echo '<li>',form::label('password','Password'),' ',form::password('password'),'</li>';
        echo '<li>',form::label('password2','Confirm Password'),' ',form::password('password2'),'</li>';
        echo '<li>',form::submit('s','Submit'),'</li>';
        echo '</ul>';
	echo form::close();
?>

<?php echo $footer ?>
