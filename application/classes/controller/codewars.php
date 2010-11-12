<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Codewars extends Controller_Template {
	public $template = 'codewars/index';

	public function before() {
                parent::before();

		$this->session = Session::instance('database');
                if(Auth::instance()->logged_in()!= 0) {
                        $this->user = Auth::instance()->get_user();
			//now you have access to user information stored in the database
                }

	}

	public function action_index() {
		$this->template->header = new View('common/header');
		if(isset($this->user)) {
			View::bind_global('user',$this->user);
		}
		$this->template->header->title = 'Home';
		$this->template->footer = new View('common/footer');
 		$this->template->sidebar = new View('common/sidebar-basic');
	}
}
