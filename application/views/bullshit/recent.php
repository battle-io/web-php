<?php
// ************************************************************
//
//  Copyright 2010 Department of Applied Mathematics (APPM) at the 
//		       University of Colorado at Boulder (UCB)
//
//  Revision History:
//  01/24/2011  jb    Created File
//
//  Confidential: Not for use or disclosure outside APPM-UCB without
//                        prior written consent.
//
// ***********************************************************
?>
<?php
  echo View::factory('bullshit/common/header')
    ->set('title','Bullshit Recent Games');
?>

<h2>
  Recent Games
</h2>
<?php
  function echoBot($id, $winner = null) {
    if($id == $winner) {
      echo '<td class="winner">',$id,'</td>';
    }
    else {
      echo '<td>',$id,'</td>';
    }
  }

  function echoGame($game) {
    echo '<tr><td>',$game->idGames,'</td>';
    for($i=1;$i<=4;$i++) {
      $bot = 'Bot'.$i;
      echoBot($game->$bot,$game->Winner);
    }
    echo '</tr>';

  }

  function echoGames($games) {
    echo '<table><tr><th>Game Id</th><th>Bot 1</th><th>Bot 2</th><th>Bot 3</th><th>Bot 4</th></tr>';
    foreach($games as $game) {
      echoGame($game);
    }
    echo '</table>';
  }

  echoGames($recentGames);
?>

<h2>
  My Recent Games
</h2>
<?php
  if(isset($user)){
    echoGames($myRecentGames);
  }
  else{
    echo "Please log in to view your recent games.<br/>";
  }
?>
<?php
  echo View::factory('bullshit/common/footer');
//  echo View::factory('profiler/stats');
