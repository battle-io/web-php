<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {
	protected $has_and_belongs_to_many = array('roles');
	protected $_has_many = array(
		'bots'		=> array('foreign_key'=>'uid'),
		// from Model_Auth_User:
		'user_tokens' => array('model' => 'user_token'),
		'roles'       => array('model' => 'role', 'through' => 'roles_users'),
	);
 
	public function link() {
		return 'user/'.$this->id;
	}

	public function fullname() {
		return html::chars($this->firstname.' '.$this->lastname);
	}

	public function name() {
		return html::chars($this->firstname.' '.$this->lastname[0].'.');
	}

	public function uri() {
		return 'user/'.$this->id;
	}

	public function setPassword($post) {
		$post = new Validation($post);
			$this->validatePassword($post);
		if($post->validate()) {
			$this->password = $post['password'];
			if($this->save())
				return true;
		} else {
			return $post->errors('user_errors');
		}
	}

	private function validatePassword(&$post) {
		$post->rules('password',array(
			'not_empty'	=> array(),
			'min_length'	=> array(3),
			'max_length'	=> array(40),
			'matches'	=> array('password2'),
		));
	}

	public function validate($post) {
		$post = new Validate($post);
		$post->rules('firstname',array(
			'not_empty'	=> array(),
			'max_length'	=> array(10),
		));
		$post->rules('lastname',array(
			'not_empty'	=> array(),
			'max_length'	=> array(10),
		));
		$post->rules('email',array(
			'not_empty'	=> array(),
			'email'		=> array(),
			'min_length'	=> array(3),
			'max_length'	=> array(127),
		));
		$post->callback('email',array($this,'_unique_email'));
		if($post['password']!==false)
			$this->validatePassword($post);

		$errors = array();

		if($post->check()) {
			$this->firstname = $post['firstname'];
			$this->lastname = $post['lastname'];
			if($this->email != $post['email']) {
				$this->email_verified = 'False';
				$this->email = $post['email'];
				$this->sendConfirmEmail();
			}
			if(isset($post['password']) && $post['password']!==false)
				$this->password = $post['password'];
			$login_role = new Model_Role(array('name' =>'login'));
			if(!$this->has('roles', $login_role)) {
				$this->add('roles',$login_role);
			}
			if($this->save()) {
				return true;
			}
		} else {
			return $errors += $post->errors('user_errors');
		}
	}

	public function sendConfirmEmail() {
		if($this->email_verified == 'True') return false;
		$this->generate_key();

		$html_email = View::factory('register/verify_email_html');
		$text_email = View::factory('register/verify_email_text');

		$link = url::site('register/verify/?'
			.'key='.$this->activation_key
			.'&id='.$this->id);

		View::bind_global('link',$link);

		$email = new Model_Email();

		$email->message(array($this->email=>$this->fullname()),
			'[Code-Wars] Welcome to Code-Wars',
			$html_email,
			$text_email);
		return true;
	}

	public function _unique_email(Validate $array, $field) {
		// check the database for existing records
		$email_exists = (bool) ORM::factory('user')
			->where('email','=',$array[$field])
			->where('id','!=',$this->id)
			->count_all();

		if ($email_exists) {
			// add error to validation object
			$array->error($field, 'email_exists', array($array[$field]));
		}
	}

	public function generate_key($length = 20) {
                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

                $key = '';
                $chars_length = strlen($chars)-1;
                for ($i = 0; $i < $length; $i++)
                        $key .= $chars[rand(0, $chars_length)];
		$this->activation_key = $key;

		$future = time()+60*60;
		$this->activation_expire = date('YmdHis',$future);
		$this->save();
        }
}
