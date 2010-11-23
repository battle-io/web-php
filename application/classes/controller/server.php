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

		if(isset($this->user)) {
			// Handle adding a bot
			$bot_name = Arr::get($_POST,'bot',false);
			if($bot_name !== false) {
				$bot = ORM::factory('bot');
				$bot->uid = $this->user;
				$bot->sid = $server;
				$bot->name = $bot_name;
				$bot->online = 0;
				if($bot->check()) {
					$bot->save();
				} else {
					$view->set('errors',$bot->validate()->errors('bot_errors') );
				}
			}


			// Handle Comments
			if(isset($_POST['s'])) {
				$posted = Model_Comment::post('server',
					$server,$this->user,$_POST['text']);
				$view->bind('posted',$posted);
			}
		}

		$comments =  Model_Comment::fetch('server',$server,$this->request->param('page',1));

		$this->request->response = $view
			->bind('server',$server)
			->bind('comments',$comments);
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
