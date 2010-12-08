<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Bullshit extends Controller_Template {
	public $template = 'bullshit/void';
  public $title = "";
	public function before() {
                parent::before();

                if(Auth::instance()->logged_in()) {
                        $this->user = Auth::instance()->get_user();
			//now you have access to user information stored in the database
			View::bind_global('user',$this->user);
                }

	}

  public function headers(){
    echo View::factory('common/header')->set('title', $this->title);
    echo View::factory("bullshit/submenu");
  }
  public function footers(){
    echo View::factory('common/sidebar-basic');
    echo View::factory('common/footer');
  }

	public function action_index() {
	  $this->title = "Bullshit Home";
	  $this->headers();
	  echo View::factory("bullshit/index");
	  $this->footers();
	}
	public function action_about(){
	  $this->title = "About Bullshit";
  	$this->headers();
	  echo View::factory("bullshit/about");
	  $this->footers();
	}
}
