<?php
echo View::factory('common/header')
        ->set('title',$user->name());
?>
<h2><?php echo html::chars($user->name())?></h2>
<ul>
<?php
	if(isset($user)) {
		echo '<li>you are logged in</li>';
		echo '<li>',html::anchor('settings','Change your settings'),'</li>';
	}
	if(isset($user) && $profile->id == $user->id) {
		echo '<li>This is the profile page</li>';
	} else {
		echo '<li>Welcome ',$user->fullname(),'</li>';
	}
?>
<li><?php echo html::anchor('/logout','Logout'); ?></li>
</ul>
<?php
echo View::factory('common/footer')
?>
