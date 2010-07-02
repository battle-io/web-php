<?php echo $header ?>
<h2><?php echo html::specialchars($user->name())?></h2>
<ul>
<?php
	if($loggedin) {
		echo '<li>you are logged in</li>';
		echo '<li>',html::anchor('settings','Change your settings'),'</li>';
	}
	if($self) {
		echo '<li>Welcome ',$user->fullname(),'</li>';
	} else {
		echo '<li>This is the profile page</li>';
	}
?>
<li><?php echo html::anchor('/logout','Logout'); ?></li>
</ul>
<?php echo $footer ?>
