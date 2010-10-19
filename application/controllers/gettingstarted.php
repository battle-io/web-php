<?php defined('SYSPATH') OR die('No direct access allowed.');

class GettingStarted_Controller extends Controller {
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
		$view = new View('codewars/getting-started');
		$view->header = new View('common/header');
		if(isset($this->user)) {
			$view->header->user = $this->user;
		}
		$view->header->title = 'Getting Started';
		$view->footer = new View('common/footer');
		$view->render(true);
	}
}
