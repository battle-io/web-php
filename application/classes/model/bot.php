<?php defined('SYSPATH') or die('No direct script access.');

class Model_Bot extends ORM {
	protected $_belongs_to = array(
		'user'		=> array('foreign_key'=>'uid'),
		'server'	=> array('foreign_key' => 'sid'),
	);

	protected $_rules = array(
		'name'	=> array(
			'not_empty'	=> array(),
			'alpha_dash'	=> array(),
		),
	);

	public function uri() {
		return 'bot/'.$this->id;
	}
}
