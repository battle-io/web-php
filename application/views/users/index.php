<?php
echo View::factory('common/header')
        ->set('title','Users Admin Tool')
	->set('css',array('css/admin.css'));
?>
<h3>Users Admin Tool</h3>
<?php
	echo form::open(null,array('id'=>'filter','method'=>'get'));
	$select_roles = 
		$roles->as_array('id','name');
	$select_roles['all'] = 'All';
	asort($select_roles);
	echo form::select('role',
		$select_roles,
		$role,
		array('id'=>'roles'));
	echo form::input('q',$q);
	echo form::submit('s','Submit');
	echo form::close();

	echo '<div id="roles_control">';
	echo form::open(null,array('id'=>'add_role'));
	echo form::input('role');
	echo form::submit('s','Submit');
	echo form::close();

	echo '<ul>';
	foreach($roles as $role) {
		$count = $role->users->count_all();
		echo '<li>',
			html::anchor('users/?role='.$role->id,$role->name),
			' (',$count,')';
		if($count == 0) {
			echo ' ',html::anchor('users/delete_role/'.$role->id,
				'delete');
		}
		echo '</li>';
	}
	echo '</ul>';
	echo '</div>';
?>
<ul id="user_list">
<?php
	foreach($users as $user) {
		echo View::factory('users/user')
			->bind('u',$user)
			->bind('roles',$roles);
	}
?>
</ul>
<?php
$pagination = Pagination::factory(array(
                'current_page'  => array('source'=>'route', 'key'=>'id'),
		'total_items'	=> $total,
		'items_per_page'	=> $per_page,
		'auto_hide'	=> true
));

echo $pagination->render();


echo View::factory('common/footer')
	->set('scripts',array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js',
		'scripts/users.js'
	));
//echo View::factory('profiler/stats');
