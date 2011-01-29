<?php defined('SYSPATH') OR die('No direct access allowed.');

// ************************************************************
//
//  Copyright 2010 Department of Applied Mathematics (APPM) at the
//           University of Colorado at Boulder (UCB)
//
//  Revision History:
//  01/01/2011  jb    Updated file to have header
//  01/28/2011  jb    Added download capabilities for zip files within the /views/bullshit/codewrappers directory, put Java wrapper up
//
//  Confidential: Not for use or disclosure outside APPM-UCB without
//                        prior written consent.
//
// ***********************************************************
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

  private function download($dir, $file) {
    chdir($dir);
    // if the filename is in the array
    if(preg_match("/\.zip$/", $file)){
      // and it exists
      if(file_exists($file)){
        // and is readable
        if(is_readable($file)){
          // get its size
          $size=filesize($file);
          // open it for reading
          if($fp = @fopen("$file", 'r')){
            // send the headers
            header('Content-type: application/zip');
            header("Content-Length: $size");
            header("Content-Disposition: attachment; filename=\"$file\"");
            // send the file content
            fpassthru($fp);
            // close the file
            fclose($fp);
            // and quit
            exit;
          }
        }
      }
    }
  }

  public function action_wrappers($wrapperName = null){
    if($wrapperName != null){
      $this->download(dirname(__FILE__ ) . '/../../views/bullshit/codewrappers/', $wrapperName . 'Wrapper.zip');
    }
    $this->request->response = View::factory('bullshit/wrappers');
  }

  private function getUserBotId(){
    if(isset($this->user)) {
      $uid = $this->user->id;
    }
    else {
      return null;
    }

    $bid = ORM::factory('bot')
      ->with('server')
      ->where('server.name','=','cu_bullshit')
      ->where('uid','=',$uid)
      ->find();
  
    return $bid->id;
  }

  private function getLeaders() {
    return ORM::factory('bullshit_bot')
      ->order_by('rank','DESC')
      ->limit(10)
      ->find_all();
  }

  private function getScores(){
    return ORM::factory('bullshit_bot')
      ->where('idBots', '=', $this->getUserBotId())
      ->order_by('rank', 'DESC')
      ->limit(10)
      ->find_all();
  }

  public function action_scoreboards(){
    $this->request->response = View::factory('bullshit/scoreboards')
	->set('leaders',$this->getLeaders())
	->set('scores',$this->getScores());
  }

  private function getRecentGames(){
    return ORM::factory('bullshit')
      ->order_by('DatePlayed','DESC')
      ->limit(10)
      ->find_all();
  }

  private function getMyRecentGames() {
    return ORM::factory('bullshit')
      ->bot($this->getUserBotId())
      ->order_by('DatePlayed','DESC')
      ->limit(10)
      ->find_all();
  }

  public function action_recent() {
    $this->request->response = View::factory("bullshit/recent")
      ->set('recentGames', $this->getRecentGames())
      ->set('myRecentGames', $this->getMyRecentGames());
  }
}
