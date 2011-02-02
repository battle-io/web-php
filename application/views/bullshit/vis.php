<?php
// ************************************************************
//
//  Copyright 2010 Department of Applied Mathematics (APPM) at the 
//		       University of Colorado at Boulder (UCB)
//
//  Revision History:
//  01/31/2011	jb		Created File
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
  Game <?php echo $gameId; ?> Visualization
</h2>

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="550" height="400" id="pack_vis" align="middle">
	<param name="movie" value="/media/pack_vis.swf?game=<?php echo $gameId; ?>" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#ffffff" />
	<param name="play" value="true" />
	<param name="loop" value="true" />
	<param name="wmode" value="window" />
	<param name="scale" value="showall" />
	<param name="menu" value="true" />
	<param name="devicefont" value="false" />
	<param name="salign" value="" />
	<param name="allowScriptAccess" value="sameDomain" />
	<!--[if !IE]>-->
	<object type="application/x-shockwave-flash" data="/media/pack_vis.swf?game=<?php echo $gameId; ?>" width="550" height="400">
		<param name="movie" value="/media/pack_vis.swf?game=<?php echo $gameId; ?>" />
		<param name="quality" value="high" />
		<param name="bgcolor" value="#ffffff" />
		<param name="play" value="true" />
		<param name="loop" value="true" />
		<param name="wmode" value="window" />
		<param name="scale" value="showall" />
		<param name="menu" value="true" />
		<param name="devicefont" value="false" />
		<param name="salign" value="" />
		<param name="allowScriptAccess" value="sameDomain" />
	<!--<![endif]-->
		<a href="http://www.adobe.com/go/getflash">
			<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
		</a>
	<!--[if !IE]>-->
	</object>
	<!--<![endif]-->
</object>

<?php
  echo View::factory('bullshit/common/footer');
