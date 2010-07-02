<?php defined('SYSPATH') OR die('No direct access allowed.');

class Settings_Controller extends Controller {
	public function __construct() {
		parent::__construct();

		$this->session = Session::instance();
		$authentic=new Auth;
		if($authentic->logged_in()) {
			$this->user = $authentic->get_user();
			//now you have access to user information stored in the database
		} else {
			url::redirect();
		}
	}

	public function index() {
		if('POST' == $_SERVER['REQUEST_METHOD']) {
			$_POST['password'] = false;
			$result = $this->user->validate($_POST);
			if($result===true) {
				url::redirect('settings');
			} else {
				$errors = $result;
			}
		}
		$view = new View('settings/index');
		$view->header = new View('common/header');
		$view->header->title = 'settings';
		$view->footer = new View('common/footer');

		
		if(isset($errors)) $view->errors = $errors;
		$view->user = $this->user;
		$view->render(true);
	}

	public function password() {
		if('POST' == $_SERVER['REQUEST_METHOD']) {
			$result = $this->user->setPassword($_POST);
			if($result===true) {
				url::redirect('settings');
			} else {
				$errors = $result;
			}
		}
		$view = new View('settings/password');
		$view->header = new View('common/header');
		$view->header->title = 'settings';
		$view->footer = new View('common/footer');

		if(isset($errors))
			$view->errors = $errors;

		$view->render(true);
	}

}
?>
