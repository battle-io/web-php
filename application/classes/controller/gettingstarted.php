<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_GettingStarted extends Controller {
	public function before() {
                parent::before();

		$auth = Auth::instance();
                if($auth->logged_in()) {
                        $this->user = $auth->get_user();
			//now you have access to user information stored in the database
			View::bind_global('user',$this->user);
                }

	}

	public function action_index() {
		$this->request->response = View::factory('codewars/getting-started');
	}
}
