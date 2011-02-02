<?php defined('SYSPATH') or die('No direct script access.');

class Model_Bullshit extends ORM {
  protected $_table_name = 'cu_bullshit.games';
  protected $_primary_key  = 'idGames';

  protected $_belongs_to = array(
    'bot1' => array('model'=>'bot','foreign_key'=>'Bot1'),
    'bot2' => array('model'=>'bot','foreign_key'=>'Bot2'),
    'bot3' => array('model'=>'bot','foreign_key'=>'Bot3'),
    'bot4' => array('model'=>'bot','foreign_key'=>'Bot4'),
    'winner' => array('model'=>'bot','foreign_key'=>'Winner'),
  );

  public function bot($id) {
    return $this
      ->or_where('Bot1','=',$id)
      ->or_where('Bot2','=',$id)
      ->or_where('Bot3','=',$id)
      ->or_where('Bot4','=',$id)
    ;
  }
}
