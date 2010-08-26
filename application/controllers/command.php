<?php defined('SYSPATH') OR die('No direct access allowed.');

class Command_Controller extends Controller {
	public function __construct() {
                parent::__construct();

		$this->session= Session::instance();
		$this->auth=new Auth;
                if($this->auth->logged_in()) {
                        $this->user = $this->auth->get_user();
			//now you have access to user information stored in the database
                } else {
			url::redirect('');
		}

		$this->config = Kohana::config('command');
	}

	function index() {
		$view = new View('command/index');
		$view->servers = $this->config['servers'];
		$view->render(true);
	}
}
