<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {
  protected $has_and_belongs_to_many = array('roles');
  protected $_has_many = array(
    'bots'    => array('foreign_key'=>'uid'),
    // from Model_Auth_User:
    'user_tokens'  => array('model' => 'user_token'),
    'roles'    => array('model' => 'role', 'through' => 'roles_users'),
  );
  protected $new_email = false;

  protected $_ignored_columns = array(
    'password2',
  );

  protected $_rules = array(
    'firstname' => array(
      'not_empty'  => null,
      'max_length'  => array(10),
    ),
    'lastname' => array(
      'not_empty'  => null,
      'max_length'  => array(10),
    ),
    'email' => array(
      'not_empty'  => null,
      'email'    => null,
      'min_length'  => array(3),
      'max_length'  => array(127),
    ),
    'key' => array(
      'max_length'  => array(64),
      'alpha_dash'  => null,
    ),
    'password' => array(
      'not_empty'  => null,
      'min_length'  => array(3),
      'max_length'  => array(50),
    ),
    'password2' => array(
      'matches'  => array('password'),
    ),
  );

  protected $_filters = array(
    true => array(
      'trim' => null
    ),
  );

  protected $_callbacks = array(
    'email' => array(
      '_unique_email',
    ),
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

  // add functionality to the default save command before calling parent
  public function save() {

    $result = parent::save();

    // if this user has a new email we send an email to confirm
    if($this->new_email) {
      $this->email_verified = 'False';
      $this->sendConfirmEmail();
    }

    // make sure the user has the login role
    $login_role = new Model_Role(array('name' =>'login'));
    if(!$this->has('roles', $login_role)) {
      $this->add('roles',$login_role);
    }
    return $result;
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

    $this->new_email = false;
    $this->save();
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

  public function values($values) {
    if(isset($values['password']) && $values['password'] === false) {
      // use the current salted and crpted password to pass the validation
      unset($values['password']);
      $values['password2'] = $this->password;
    }
    if($this->email != $values['email']) {
      $this->new_email = true;
    }
    return parent::values($values);
  }

  private static $roles = array();
  public function has_role($role_name) {
    if(!isset(Model_User::$roles[$role_name])) {
      Model_User::$roles[$role_name] = ORM::factory('role')
        ->where('name','=',$role_name)
        ->find();
    }
    if(!Model_User::$roles[$role_name]->loaded()) {
      // not a real role
      return false;
    }
    return $this->has('roles',Model_User::$roles[$role_name]);
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
  }
}
