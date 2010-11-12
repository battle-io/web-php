<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Codewars extends Controller_Template {
	public $template = 'codewars/index';

/*
	public function __construct($request) {
                parent::__construct($request);

		$this->session= Session::instance();
		$authentic=new Auth;
                if($authentic->logged_in()) {
                        $this->user = $authentic->get_user();
			//now you have access to user information stored in the database
                }

	}
*/

	public function action_index() {
		$this->template->header = new View('common/header');
		if(isset($this->user)) {
			$this->template->header->user = $this->user;
		}
		$this->template->header->title = 'Home';
		$this->template->footer = new View('common/footer');
 		$this->template->sidebar = new View('common/sidebar-basic');
	}
}
