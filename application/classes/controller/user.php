<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_User extends Controller {
	public function before() {
                parent::before();

		$authentic= Auth::instance();
                if($authentic->logged_in()) {
                        $this->user = $authentic->get_user();
			//now you have access to user information stored in the database
			View::bind_global('user',$this->user);
                }

	}

	public function action_index() {
		if(isset($this->user))
			$this->request->redirect($this->user->link());
		$this->request->redirect();
	}

	function __call($user,$arguments) {
		$this->profile($user);
	}

	public function action_profile($user_id) {
		$profile = $this->getUser($user_id);

		$view = View::factory('user/index');

		$view->bind('profile',$profile);

		$this->request->response = $view;
	}

	private function getUser($user) {
		if(ctype_digit($user)) {
			$user = ORM::factory('user',$user);
			if($user->loaded()) {
				return $user;
			}
		}

		throw new Kohana_404_Exception('Unknown User');
	}
}
