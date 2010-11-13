<?php defined('SYSPATH') or die('No direct script access.');

class Model_Server extends ORM {
	protected $_has_many = array('bots' => array('foreign_key'=>'sid'));

	public function uri() {
		return 'server/'.$this->id;
	}
}
