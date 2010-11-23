<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Users extends Controller {
	private $users_per_page = 50;
	public function before() {
                parent::before();

		$authentic= Auth::instance();
                if($authentic->logged_in()) {
                        $this->user = $authentic->get_user();
			if($this->user->has_role('admin')) {
				//now you have access to user information stored in the database
				View::bind_global('user',$this->user);
				return;
			}
                }

		$this->request->redirect('');
	}

	public function action_index($page = 1) {
		$offset = ($page - 1) * $this->users_per_page;

		$users = ORM::factory('user');

		$role = Arr::get($_GET,'role','all');
		if($role != 'all') {
			$users = ORM::factory('role',$role)
				->users;
		}
		$ver = Arr::get($_GET,'verified','');
		if(!empty($ver)) {
			$users->where('email_verified','=',$ver);
		}

		$q = Arr::get($_GET,'q','');
		if(!empty($q)) {
			$where_q = '%'.$q.'%';
			$users
				->where_open()
					->or_where('firstname','LIKE',$where_q)
					->or_where('lastname','LIKE',$where_q)
					->or_where('email','LIKE',$where_q)
				->where_close();
		}

		$new_role = Arr::get($_POST,'role',false);
		if(false !== $new_role) {
			$role = ORM::factory('role')
				->where('name','=',$new_role)
				->find();
			if(!$role->loaded()) {
				$role->name = $new_role;
				$role->save();
			}
		}

		$total = $users
			->reset(false)
			->count_all();

		$users = $users
			->offset($offset)
			->limit($this->users_per_page)
			->order_by('lastname')
			->order_by('firstname')
			->find_all();

		$roles = ORM::factory('role')
			->find_all();

		$verified = ORM::factory('user')
			->where('email_verified','=','True')
			->count_all();

		$this->request->response = View::factory('users/index')
			->bind('users',$users)
			->bind('roles',$roles)
			->bind('verified',$verified)
			->bind('role',$role)
			->bind('q',$q)
			->bind('total',$total)
			->bind('per_page',$this->users_per_page);
	}

	public function action_set_role() {
		$user = ORM::factory('user',$_POST['user_id']);
		if(!$user->loaded()) {
			echo 'not a user';
			return;
		}

		$role = ORM::factory('role',$_POST['role_id']);

		if(!$role->loaded()) {
			echo 'not a role';
			return;
		}

		if($user->has('roles',$role)) {
			$user->remove('roles',$role);
		}
		else {
			$user->add('roles',$role);
		}

		$roles = ORM::factory('role')
			->find_all();

		$this->request->response = View::factory('users/user')
			->bind('u',$user)
			->bind('roles',$roles);
	}

	public function action_delete_role($role_id) {
		$role = ORM::factory('role',$role_id);
		if(!$role->loaded()) {
			throw new Kohana_Exception('404');
		}

		$count = $role->users->count_all();
		if($count > 0) {
			throw new Kohana_Exception('404');
		}

		$role->delete();
		$this->request->redirect('users');
	}

}
