<?php defined('SYSPATH') OR die('No direct access allowed.');

class Register_Controller extends Controller {
	public function __construct() {
                parent::__construct();

		$this->session= Session::instance();
		$this->authentic=new Auth;
                if($this->authentic->logged_in()) {
                        $this->user = $this->authentic->get_user();
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

	public function verify() {
		$get = new Validation($_GET);
		$get->add_rules('id', 'required', 'numeric');
		$get->add_rules('key', 'required', 'alpha_numeric');
		if($get->validate()) {
			$user = ORM::factory('user')
				->where(array(
					'id'			=> $get['id'],
					'activation_key'	=> $get['key']
				))
				->find();
			if($user->loaded) {
				$user->activation_key = null;
				$user->activation_expire = null;
				$user->email_verified = 'True';
				$user->save();
				$this->authentic->force_login($user);
				url::redirect('settings');
			}
		}
		throw new Kohana_404_Exception('Bad Request');
	}
}
