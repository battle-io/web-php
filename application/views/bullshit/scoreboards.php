<?
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
<h2>
  Leaderboards
</h2>
<?= $leaderboard ?>

<h2>
  Scoreboard
</h2>
<?php
  if(Auth::instance()->logged_in()){
    echo $scoreboard;
  }
  else{
    echo "Please log in to view your scoreboard.<br/>";
  }
?>
