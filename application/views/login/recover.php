<?php echo $header ?>
<?php
	if(isset($message)) {
		print_r($message);
	}
	echo form::open();
        echo '<ul>';
        echo '<li>',form::label('email','Email'),' ',form::input('email'),'</li>';
        echo '<li>',form::submit('l','Submit'),'</li>';
        echo '</ul>';
	echo form::close();
?>
<?php echo $footer ?>
