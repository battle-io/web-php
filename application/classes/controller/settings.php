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
			$this->request->redirect('login');
		}
	}

	public function action_index($message = false) {
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
		
		if(isset($errors)) {
			$view->bind('errors',$errors);
		}
		$view->bind('message',$message);

		$this->request->response = $view;
	}

	public function action_re_verify() {
		$sent = $this->user->sendConfirmEmail();
		if($sent === false) $this->request->redirect('settings');
		$this->action_index('Confirmation Sent');
	}
}
?>
