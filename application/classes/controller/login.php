<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Login extends Controller {
  public function before() {
                parent::before();

    $this->authentic = Auth::instance();
                if($this->authentic->logged_in()) {
                        $user = $this->authentic->get_user();
      $this->request->redirect($user->link());
                }
  }

  public function action_index() {
    $view = View::factory('login/index');
    if('POST' == $_SERVER['REQUEST_METHOD']) {
      $post = new Validate($_POST);
      $post->rules('email',array(
        'not_empty'  => array(),
        'email'    => array()
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
        'not_empty'  => array(),
        'email'    => array(),
      ));

      if($post->check()) {
        $user = ORM::factory('user')
          ->where('email','=',$post['email'])
          ->find();
        if('True' == $user->email_verified) {
          $user->generate_key();
	  $user->save();
/*
          //send an email
          $q = new Pheanstalk_Model('codewars-email');
          $q->put('password:'.$user->id,Pheanstalk_Model::PRIORITY_HIGH);
*/
          $html_email = View::factory('login/recover_email_html');
          $text_email = View::factory('login/recover_email_text');

	  $link = url::site('login/recover/?'
            .'key='.$user->activation_key
            .'&id='.$user->id);
          View::bind_global('link',$link);

          $email = new Model_Email();
          $messages = $email->message(array($user->email  => $user->fullname()),
            '[Code-Wars] Password Recovery',
            $html_email,
            $text_email);

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

  public function action_recover() {
    $get = new Validate($_GET);
    $get->rules('id', array(
      'not_empty'  => array(),
      'numeric'  => array(),
    ));
    $get->rules('key', array(
      'not_empty'  => array(),
      'alpha_numeric'  => array(),
    ));
    if($get->check()) {
      $user = ORM::factory('user')
        ->where('id','=',$get['id'])
        ->where('activation_key','=',$get['key'])
        ->where('activation_expire','>=',date('YmdHis'))
        ->find();
      if($user->loaded()) {
        $user->activation_key = null;
        $user->activation_expire = null;
        $user->save();
        $this->authentic->force_login($user);
        $this->request->redirect('settings');
      }
    }
    throw new Kohana_404_Exception('Bad Request');
  }
}
