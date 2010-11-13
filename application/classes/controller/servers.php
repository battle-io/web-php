<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Servers extends Controller {
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
		$servers = ORM::factory('server')->find_all();
		$this->request->response = View::factory('servers/index')
			->bind('servers',$servers);
	}

}
