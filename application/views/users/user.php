<?php
	echo '<li id="user_',$u,'" class="user">';
		echo '<div>',
		html::anchor($u->uri(),$u->fullname()),
			' last login: ',date('F jS, Y',$u->last_login),
		'</div>';

	$u_roles = $u
		->roles
		->find_all()
		->as_array('id','name');
	echo '<ul class="right roles">';
	foreach($roles as $role) {
		echo '<li class="role_',$role->id,'">';
		if(isset($u_roles[$role->id])) {
			echo 'de ',$role->name;
		}
		else {
			echo 'add ',$role->name;
		}
		echo '</li>';
	}
	echo '</ul>';

		echo '<ul>',
			'<li>',
				($u->email_verified=='True'?
					'verified':'unverified'),
			'</li>',
			'<li>bots ',
			$u->bots->count_all(),'</li>';
			echo '<li>logins: ',$u->logins,'</li>',
		'</ul>';
	echo '</li>';
