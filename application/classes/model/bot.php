<?php defined('SYSPATH') or die('No direct script access.');

class Model_Bot extends ORM {
	protected $_belongs_to = array(
		'user'		=> array('foreign_key'=>'uid'),
		'server'	=> array('foreign_key' => 'sid'),
	);

	public function uri() {
		return 'bot/'.$this->id;
	}
}
