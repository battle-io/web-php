<?php defined('SYSPATH') OR die('No direct access allowed.');

// ************************************************************
//
//  Copyright 2010 Department of Applied Mathematics (APPM) at the 
//		       University of Colorado at Boulder (UCB)
//
//  Revision History:
//  01/01/2011	jb		Updated file to have header
//
//  Confidential: Not for use or disclosure outside APPM-UCB without
//                        prior written consent.
//
// ***********************************************************


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
    echo View::factory('bullshit/common/header')->set('title', $this->title);
  }
  public function footers(){
    echo View::factory('bullshit/common/footer');
  }

	public function action_index() {
	  $this->title = "Bullshit Home";
	  $this->headers();
	  echo View::factory("bullshit/index");
	  $this->footers();
	}
	public function action_wrappers(){
	  $this->title = "Bullshit Wrappers";
  	$this->headers();
	  echo View::factory("bullshit/wrappers");
	  $this->footers();
	}
}
