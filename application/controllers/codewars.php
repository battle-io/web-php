<?php defined('SYSPATH') OR die('No direct access allowed.');

class Codewars_Controller extends Template_Controller {
	public $template = 'codewars/index';

	public function index() {
		$this->template->header = new View('common/header');
		$this->template->header->title = 'Home';
		$this->template->footer = new View('common/footer');
	}
}
