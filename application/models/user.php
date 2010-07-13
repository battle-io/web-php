<?php defined('SYSPATH') or die('No direct script access.');

class User_Model extends Auth_User_Model {
	protected $has_and_belongs_to_many = array('roles');
 
	public function unique_key($id = NULL) {
		if ( ! empty($id) AND is_string($id) AND ! ctype_digit($id) ) {
			return 'email';
		}
		return parent::unique_key($id);
	}

	public function link() {
		return 'user/'.$this->id;
	}

	public function fullname() {
		return html::specialchars($this->firstname.' '.$this->lastname);
	}

	public function name() {
		return html::specialchars($this->firstname.' '.$this->lastname[0].'.');
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
		$post->add_rules('password','required','length[3,40]','matches[password2]');
	}

	public function validate($post) {
		$post = new Validation($post);
		$post->add_rules('firstname','required','length[1,10]');
		$post->add_rules('lastname','required','length[1,10]');
		$post->add_rules('email', 'required', 'email','length[3,127]');
		$post->add_callbacks('email',array($this,'_unique_email'));
		if($post['password']!==false)
			$this->validatePassword($post);

		$errors = array();

		if($post->validate()) {
			$this->firstname = $post['firstname'];
			$this->lastname = $post['lastname'];
			if($this->email != $post['email']) {
				$this->email_verified = 'False';
				$this->email = $post['email'];

				$this->generate_key();

				$html_email = new View('register/verify_email_html');
				$html_email->host = Kohana::config('core.host');
				$link = url::site('register/verify/?'
					.'key='.$this->activation_key
					.'&id='.$this->id);
				$html_email->link = $link;

				$text_email = new View('register/verify_email_text');
				$text_email->host = Kohana::config('core.host');
				$text_email->link = $link;
				$email = new Email_Model();

				$email->message(array($this->email=>$this->fullname()),
					'[Code-Wars] Welcome to Code-Wars',
				$html_email->render(false),
				$text_email->render(false));
			}
			if($post['password']!==false)
				$this->password = $post['password'];
			if(!$this->has(ORM::factory('role', 'login'))) {
				$this->add(ORM::factory('role', 'login'));
			}
			if($this->save()) {
				return true;
			}
		} else {
			return $errors += $post->errors('user_errors');
		}
	}

	public function _unique_email(Validation $array, $field) {
		// check the database for existing records
		$email_exists = (bool) ORM::factory('user')
			->where(array(
				'email'	=> $array[$field],
				'id !='	=> $this->id
			))
			->count_all();

		if ($email_exists) {
			// add error to validation object
			$array->add_error($field, 'email_exists');
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
