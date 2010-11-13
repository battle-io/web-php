<?php
echo View::factory('common/header')
        ->set('title',$profile->name());
?>
<h2><?php echo html::chars($profile->name())?></h2>
<ul>
<?php
	if(isset($user) && $profile->id == $user->id) {
		echo '<li>Welcome ',$user->fullname(),' this is your profile page</li>';
	} else {
		echo '<li>This is the profile page</li>';
	}
?>
<li><?php echo html::anchor('/logout','Logout'); ?></li>
</ul>
<?php
echo View::factory('common/footer')
?>
