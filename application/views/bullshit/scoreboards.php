<?php
// ************************************************************
//
//  Copyright 2010 Department of Applied Mathematics (APPM) at the 
//		       University of Colorado at Boulder (UCB)
//
//  Revision History:
//  01/15/2011	jb		Created File
//  01/24/2011  jb    Updated File contents
//
//  Confidential: Not for use or disclosure outside APPM-UCB without
//                        prior written consent.
//
// ***********************************************************
?>

<?php
  echo View::factory('bullshit/common/header')
    ->set('title','Bullshit Scoreboards');
?>
<h2>
  Leaderboards
</h2>
<table><tr><th>Rank</th><th>Bot</th></tr>
<?php
foreach($leaders as $leader) {
  echo '<tr><td>',$leader->rank,'</td><td>',$leader->idBots,'</td></td>';
}
?>
</table>

<h2>
  Scoreboard
</h2>
<?php
  if(isset($user)){
    echo '<table><tr><th>Rank</th><th>Bot</th></tr>';
    foreach($scores as $bot) {
      echo '<tr>',
	'<td>',$bot->rank,'</td>',
	'<td>',$bot->idBots,'</td>',
	'</tr>';
    }
    echo '</table>';
  }
  else{
    echo "Please log in to view your scoreboard.<br/>";
  }
?>
<?php
  echo View::factory('bullshit/common/footer');
