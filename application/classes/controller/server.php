<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Server extends Controller {
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
		$this->request->redirect('servers');
	}

	public function action_profile($server_id) {
		$server = $this->getServer($server_id);

		$view = View::factory('server/index');

		$view->bind('server',$server);

		$this->request->response = $view;
	}

	private function getServer($server_id) {
		if(ctype_digit($server_id)) {
			$server = ORM::factory('server',$server_id);
			if($server->loaded()) {
				return $server;
			}
		}

		throw new Kohana_404_Exception('Unknown User');
	}
}
