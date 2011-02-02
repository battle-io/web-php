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
  
  private function toIntermediate($str){
    $arr = explode("\n", $str);
    foreach($arr AS $index=>$row){
      $arr[$index] = preg_replace(array("(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2},\d+ - )", "/<(.*?)>/"), array("", "$1"), $row);
      if(preg_match("/played cards : /", $row)){
        $arr[$index] = preg_replace("/(.*?) played cards : ([\d{1,2}?=,]+) expected (.*?)$/", "\t\t<bot>$1</bot>\n\t\t<type>played</type>\n\t\t<cards>$2</cards>", $arr[$index]);
      }
      else if(preg_match("/the cards/", $row)){
        $arr[$index] = preg_replace("/(.*?) received the cards ([\d{1,2}?=,]+) due to a bullshit call by (.*?)$/", "\t\t<bot>$1</bot>\n\t\t<type>received</type>\n\t\t<cards>$2</cards>\n\t\t<from>$3</from>", $arr[$index]);
      }
      else if(preg_match("/Dealt hand/", $row)){
        $arr[$index] = preg_replace("/Dealt hand ([\d{1,2}?=,]+) to bot (.*?)$/", "\t\t<bot>Bot $2</bot>\n\t\t<type>deal</type>\n\t\t<cards>$1</cards>", $arr[$index]);
      }
      else if(preg_match("/Winner was found for game/", $row)){
        $arr[$index] = preg_replace("/A Winner was found for game (.*?) it was bot (.*?)$/", "\t\t<bot>Bot $2</bot>\n\t\t<type>win</type>\n\t\t<cards></cards>", $arr[$index]);
      }
      else{
        $arr[$index] = null;
      }
    }
    return $arr;
  }
  
  private function toXML($arr, $i){
    $op = "";
    $op .= "<" . "?xml version='1.0'?" . ">\n<game id=\"" . $i . "\">\n";
    foreach($arr as $b){
      if($b != null){
        $op .= "\t<move>\n" . $b . "\n\t</move>\n";
      }
    }
    $op .= "</game>";
    return $op;
  }
  
  public function action_game($gameId){
    $gameInfo = ORM::factory('bullshit')
    ->where('idGames', '=', $gameId)
    ->find();
    $game = $this->toIntermediate($gameInfo->GameHistory);
    $this->request->response = View::factory("bullshit/game")
    ->set('game', $this->toXML($game, $gameId));
  }
  
  public function action_vis($gameId){
    $this->request->response = View::factory("bullshit/vis")
    ->set("gameId", $gameId);
  }
}
