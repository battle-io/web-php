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
			if(isset($_POST['password']) && empty($_POST['password'])
				&& isset($_POST['password2']) && empty($_POST['password2'])) {
				$_POST['password'] = false;
			}
			$result = $this->user->validate($_POST);
			if($result===true) {
				url::redirect('settings');
			} else {
				$errors = $result;
			}
		}
		$view = new View('settings/index');
		$view->header = new View('common/header');
		if(isset($this->user)) {
			$view->header->user = $this->user;
		}
		$view->header->title = 'settings';
		$view->footer = new View('common/footer');

		
		if(isset($errors)) $view->errors = $errors;
		$view->user = $this->user;
		$view->render(true);
	}
}
?>
