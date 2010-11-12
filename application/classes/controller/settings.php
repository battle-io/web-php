<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Settings extends Controller {
	public function before() {
		parent::before();

		$authentic=Auth::instance();
		if($authentic->logged_in()) {
			$this->user = $authentic->get_user();
			//now you have access to user information stored in the database
			View::bind_global('user',$this->user);
		} else {
echo 'you are not logged in?';
exit();
//			$this->request->redirect();
		}
	}

	public function action_index() {
		if('POST' == $_SERVER['REQUEST_METHOD']) {
			if(isset($_POST['password']) && empty($_POST['password'])
				&& isset($_POST['password2']) && empty($_POST['password2'])) {
				$_POST['password'] = false;
			}
			$result = $this->user->validate($_POST);
			if($result===true) {
				$this->request->redirect('settings');
			} else {
				$errors = $result;
			}
		}
		$view = View::factory('settings/index');
		$view->header = new View('common/header');
		if(isset($this->user)) {
			$view->header->user = $this->user;
		}
		$view->header->title = 'settings';
		$view->footer = new View('common/footer');

		
		if(isset($errors)) $view->errors = $errors;
		$view->user = $this->user;
		$this->request->response = $view;
	}
}
?>
