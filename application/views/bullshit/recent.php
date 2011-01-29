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
<?php echo $recentGames ?>

<h2>
  My Recent Games
</h2>
<?php
  if(Auth::instance()->logged_in()){
    echo $myRecentGames;
  }
  else{
    echo "Please log in to view your recent games.<br/>";
  }
?>
<?php
  echo View::factory('bullshit/common/footer');
