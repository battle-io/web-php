<?php defined('SYSPATH') OR die('No direct access allowed.');

class User_Controller extends Controller {
	public function __construct() {
                parent::__construct();

		$this->session= Session::instance();
		$authentic=new Auth;
                if($authentic->logged_in()) {
                        $this->user = $authentic->get_user();
			//now you have access to user information stored in the database
                }

	}

	public function index() {
		if(isset($this->user))
			url::redirect($this->user->link());
		url::redirect();
	}

	function __call($user,$arguments) {
//$this->profiler = new Profiler;
		$this->profile($user);
	}

	private function profile($user) {
		$user = $this->getUser($user);

		$view = new View('user/index');
		$view->header = new View('common/header');
		$view->header->title = $user->name();
		if(isset($this->user)) {
			$view->header->user = $this->user;
		}
		$view->footer = new View('common/footer');

		$view->user = $user;
		if(isset($this->user)) {
			$view->loggedin = true;
			$view->self = $user->id == $this->user->id;
		} else {
			$view->loggedin = false;
			$view->self = false;
		}
		$view->render(true);
	}

	private function getUser($user) {
		if(ctype_digit($user)) {
			$user = ORM::factory('user',$user);
			if($user->loaded) {
				return $user;
			}
		}

		throw new Kohana_404_Exception('Unknown User');
	}
}
