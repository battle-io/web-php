<?php
echo View::factory('common/header')
        ->set('title','Users Admin Tool')
	->set('css',array('css/admin.css'));
?>
<h3>Users Admin Tool</h3>
<ul id="user_list">
<?php
	$admin_role = new Model_Role(array('name' =>'admin'));
	foreach($users as $user) {
		echo '<li id="user_',$user,'">',$user->fullname(),' ';
		if($user->has('roles',$admin_role)) {
			echo '<em>admin</em>';
		} else {
			echo '<em class="hide">promote to admin</em>';
		}
		'</li>';
	}
?>
</ul>
<?php
echo View::factory('common/footer')
	->set('scripts',array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js',
		'scripts/users.js'
	));
//echo View::factory('profiler/stats');
