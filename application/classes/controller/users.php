<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Users extends Controller {
	public $auth_required = array('admin');
	public function before() {
                parent::before();

		$authentic= Auth::instance();
		$this->admin_role = new Model_Role(array('name' =>'admin'));
                if($authentic->logged_in()) {
                        $this->user = $authentic->get_user();
			if($this->user->has('roles',$this->admin_role)) {
				//now you have access to user information stored in the database
				View::bind_global('user',$this->user);
				return;
			}
                }

		$this->request->redirect('');
	}

	public function action_index() {
		$users = ORM::factory('user')
			->order_by('lastname')
			->order_by('firstname')
			->find_all();

		$this->request->response = View::factory('users/index')
			->bind('users',$users);
	}
	public function action_set_role() {
		$user = ORM::factory('user',$_POST['user_id']);
		if(!$user->loaded()) {
			echo 'not a user';
			return;
		}
		$role = ORM::factory('role')
			->where('name','=',$_POST['role'])
			->find();

		if(!$role->loaded()) {
			echo 'not a role';
			return;
		}

		if($user->has('roles',$role)) {
			$user->remove('roles',$role);
			echo '<em class="hide">promote to admin</em>';
		}
		else {
			$user->add('roles',$role);
			echo '<em>admin</em>';
		}
	}
}
