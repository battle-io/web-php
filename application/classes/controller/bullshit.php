<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Bullshit extends Controller {

  public function before() {
    parent::before();

    if(Auth::instance()->logged_in()) {
      $this->user = Auth::instance()->get_user();
      //now you have access to user information stored in the database
      View::bind_global('user',$this->user);
    }
  }

  public function action_index() {
    $this->request->response = View::factory("bullshit/index");
  }

  public function action_wrappers(){
    $this->request->response =  View::factory("bullshit/wrappers");
  }
}
