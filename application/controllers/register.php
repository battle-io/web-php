<?php defined('SYSPATH') OR die('No direct access allowed.');

class Register_Controller extends Controller {
	public function __construct() {
                parent::__construct();

		$this->session= Session::instance();
		$authentic=new Auth;
                if($authentic->logged_in()) {
                        $this->user = $authentic->get_user();
			//now you have access to user information stored in the database
                }

	}

	function index() {
		if('POST' == $_SERVER['REQUEST_METHOD']) {
			$user = ORM::factory('user');
			$result = $user->validate($_POST);
			if($result===true) {
				Auth::instance()->login($this->input->post('email'),
					$this->input->post('password')
				);
				url::redirect('user');
			}
			else $errors = $result;
		}
		$view = new View('register/index');
		$view->header = new View('common/header');
		$view->header->title = 'Register';
		$view->footer = new View('common/footer');

		if(isset($errors)) $view->errors = $errors;
		$view->render(true);
	}
}
