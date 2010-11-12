<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Logout extends Controller {
	public function before() {
                parent::before();

		$this->auth = Auth::instance();
                if($this->auth->logged_in()) {
                        $this->user = $this->auth->get_user();
			//now you have access to user information stored in the database
                } else {
			$this->request->redirect('');
		}
	}

	public function action_index() {
                $this->auth->logout(true);
		$this->request->redirect('');
	}
}
