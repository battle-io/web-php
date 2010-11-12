<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Login extends Controller {
	public function before() {
                parent::before();

		$this->authentic = Auth::instance();
                if($this->authentic->logged_in()) {
                        $user = $this->authentic->get_user();
			url::redirect($user->link());
                }
	}

	public function action_index() {
		$view = View::factory('login/index');
		if('POST' == $_SERVER['REQUEST_METHOD']) {
			$post = new Validate($_POST);
			$post->rules('email',array(
				'not_empty'	=> array(),
				'email'		=> array()
			));
			$post->rule('password','not_empty');

			if($post->check()) {
				$user = ORM::factory('user')
					->where('email','=',$post['email'])
					->find();
				if(!$user->loaded()) {
					$view->set('message','Not a valid user or an incorect password');
				}
				elseif($this->authentic->login($user,$post['password'])) {
					$this->request->redirect('user');
				} else {
					$view->set('message','Not a valid user or an incorect password');
				}
			} else {
				$view->set('message',$post->errors('login_errors'));
			}

		}

		$this->request->response = $view;
	}

	public function action_recover_request() {
		$view = View::factory('login/recover');
		if('POST' == $_SERVER['REQUEST_METHOD']) {
			$post = new Validate($_POST);
			$post->rules('email', array(
				'not_empty'	=> array(),
				'email'		=> array(),
			));

			if($post->check()) {
				$user = ORM::factory('user',$post['email']);
				if('True' == $user->email_verified) {
					$user->generate_key();
/*
					//send an email
					$q = new Pheanstalk_Model('codewars-email');
					$q->put('password:'.$user->id,Pheanstalk_Model::PRIORITY_HIGH);
*/
					$html_email = new View('login/recover_email_html');
					$text_email = new View('login/recover_email_text');

			                $link = url::site('login/recover/?'
						.'key='.$user->activation_key
						.'&id='.$user->id);

					$html_email->host = Kohana::config('core.host');
					$html_email->link = $link;

					$text_email->link = $link;
					$text_email->host = Kohana::config('core.host');
					$email = new Email_Model();
					$messages = $email->message(array($user->email  => $user->fullname()),
						'[Code-Wars] Password Recovery',
						$html_email->render(false),
						$text_email->render(false));

					if(false === $messages) {
						$view->set('message','Looks like email has not been configured serverside');
					} else {
						$view = View::factory('login/recover_sent');
					} 
				} else {
					$view->set('message','Your email address was not verified we can not send you a password recovery email');
				}
			} else {
				$view->set('message',$post->errors('login_errors'));
			}
		}
		$this->request->response = $view;
	}

	public function recover() {
		$get = new Validation($_GET);
		$get->add_rules('id', 'required', 'numeric');
		$get->add_rules('key', 'required', 'alpha_numeric');
		if($get->validate()) {
			$user = ORM::factory('user')
				->where(array(
					'id'			=> $get['id'],
					'activation_key'	=> $get['key'],
					'activation_expire >='	=> date('YmdHis')
				))
				->find();
			if($user->loaded()) {
				$user->activation_key = null;
				$user->activation_expire = null;
				$user->save();
				$this->authentic->force_login($user);
				url::redirect('settings/password');
			}
		}
		throw new Kohana_404_Exception('Bad Request');
	}
}
