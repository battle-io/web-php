<?php defined('SYSPATH') OR die('No direct access allowed.');

class Login_Controller extends Controller {
	public function __construct() {
                parent::__construct();

		$this->session= Session::instance();
		$this->authentic=new Auth;
                if($this->authentic->logged_in()) {
                        $user = $this->authentic->get_user();
			url::redirect($user->link());
                }
	}

	public function index() {
		$view = new View('login/index');
		if('POST' == $_SERVER['REQUEST_METHOD']) {
			$post = new Validation($_POST);
			$post->add_rules('email', 'required', 'email');
			$post->add_rules('password','required');

			if($post->validate()) {
				$user = ORM::factory('user',$post['email']);
				$this->auth = new Auth();
				if(!$user->loaded) {
					$view->message = 'Not a valid user or an incorect password';
				}
				elseif($this->auth->login($user,$post['password'])) {
					url::redirect('user');
				} else {
					$view->message = 'Not a valid user or an incorect password';
				}
			} else {
				$view->message = $post->errors('login_errors');
			}

		}

		$view->header = new View('common/header');
		$view->header->title = 'Login';
		$view->footer = new View('common/footer');
		$view->render(true);
	}

	public function recover_request() {
		$view = new View('login/recover');
		if('POST' == $_SERVER['REQUEST_METHOD']) {
			$post = new Validation($_POST);
			$post->add_rules('email', 'required', 'email');

			if($post->validate()) {
				$user = ORM::factory('user',$post['email']);
				$user->activation_key = $this->generate_key();
				$future = time()+60*60;
				$user->activation_expire = date('YmdHis',$future);
				$user->save();

/*
				//send an email
				$q = new Pheanstalk_Model('codewars-email');
				$q->put('password:'.$user->id,Pheanstalk_Model::PRIORITY_HIGH);
*/
				$view = new View('login/recover_sent');
			} else {
				$view->message = $post->errors('login_errors');
			}
		}
		$view->header = new View('common/header');
		$view->header->title = 'Recover';
		$view->footer = new View('common/footer');
		$view->render(true);
	}

	public function recover() {
		$get = new Validation($_GET);
		$get->add_rules('email', 'required', 'email');
		$get->add_rules('key', 'required', 'alpha_numeric');
		if($get->validate()) {
			$user = ORM::factory('user')
				->where(array(
					'email'			=> $get['email'],
					'activation_key'	=> $get['key'],
					'activation_expire >='	=> date('YmdHis')
				))
				->find();
			if($user->loaded) {
				$user->activation_key = null;
				$user->activation_expire = null;
				$user->save();
				$this->authentic->force_login($user);
				url::redirect('settings/password');
			}
		}
		throw new Kohana_404_Exception('Bad Request');
	}

	private function generate_key($length = 20) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

		$password = '';
		$chars_length = strlen($chars)-1;
		for ($i = 0; $i < $length; $i++)
			$password .= $chars[rand(0, $chars_length)];
		return $password;
	}
}
