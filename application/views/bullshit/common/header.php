<?
// ************************************************************
//
//  Copyright 2010 Department of Applied Mathematics (APPM) at the 
//		       University of Colorado at Boulder (UCB)
//
//  Revision History:
//  01/01/2011	jb		Updated file to have header
//  01/24/2011  jb    Updated sidebar (menu) to put in scoreboard
//                    / leaderboard link. Added login/ register to 
//                    menu
//
//  Confidential: Not for use or disclosure outside APPM-UCB without
//                        prior written consent.
//
// ***********************************************************
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>
      <?= $title ?>
    </title>
    <?php
	    $style = array
	    (
	    'css/bscss.css'
	    );
	    if(isset($css)) {
		    $style = array_merge($style,$css);
	    }
	    foreach($style as $sheet) {
		    echo html::style($sheet);
	    }
    ?>
    <script>
			onload = function(){
			  // make sure that the columns are the same height.
				var a = document.getElementById("contentPane");
				var b = document.getElementById("sidebar");
				var nh = Math.max(parseInt(a.offsetHeight), parseInt(a.clientHeight));
				var ch = Math.max(parseInt(b.offsetHeight), parseInt(b.clientHeight))
				if(nh > ch){
  				document.getElementById("menu_last").style.height = (nh-ch)+"px";
				}
			}
		</script>
  </head>
  <body>
    <div id="bigContainer">
      <div id="container">
        <div class="header">
          <a href="/bullshit/">
            <img class="centerMe" src="/media/bsimages/PACK_Header.jpg"/>
          </a>
        </div>
        <div class="leftSidebar" id="sidebar">
          <ul class="menu">
            <li>
            </li>
            <li class="link<?= ($title == "Bullshit Home" ? " active" : "") ?>">
              <a href="/bullshit/">
                Home
              </a>
            </li>
            <li class="link<?= ($title == "Bullshit Wrappers" ? " active" : "") ?>">
              <a href="/bullshit/wrappers/">
                Code Wrappers
              </a>
            </li>
            <li class="link<?= ($title == "Bullshit Scoreboards" ? " active" : "") ?>">
              <!--<a href="/bullshit/scoreboards/">-->
                Scoreboards
              <!--</a>-->
            </li>
            <li class="link<?= ($title == "Bullshit Recent Games" ? " active" : "") ?>">
              <!--<a href="/bullshit/recent/">-->
                Recent Games
              <!--</a>-->
            </li>
            <?
              if(isset($user)) {
					      echo '<li class="link">',html::anchor('user/'.$user->id,$user->name()),'</li>';
					      echo '<li class="link">',html::anchor('settings','Settings'),'</li>';
					      echo '<li class="link">',html::anchor('logout','Logout'),'</li>';
				      }
				      else {
					      echo '<li class="link">',html::anchor('login','Login'),'</li>';
					      echo '<li class="link">',html::anchor('register','Register'),'</li>';
				      }
            ?>
            <li id="menu_last">
            </li>
          </ul>
        </div>
        <div class="content" id="contentPane">
