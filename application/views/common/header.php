<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?> - Code-Wars</title>
<?php
	$style = array
	(
	'http://yui.yahooapis.com/combo?2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css',
	'css/cwglobal.css'
	);
	if(isset($css)) {
		$style = array_merge($style,$css);
	}
	foreach($style as $sheet) {
		echo html::style($sheet);
	}
?>

</head>
<body class="yui-skin-sam">
<div id="doc3" <?php 
	// if layout == 'nosidebar', don't do anything
	if(isset($layout)) { if($layout=="nosidebar") echo ''; }
	// else use yui css grids preset t6 
	else echo 'class="yui-t6"' ?> 
	> 
<!-- id hd is the first YUI horizontal stack, the masthead -->
<div id="hd">
	<div id="headersection" class="cenwrap">
	    <div class="yui-ge">
	    	<div id="cw-logo">
	    		<h1 id="cw-topbar">Code-wars</h1>
	    	</div>
		    <div class="yui-u"></div>
		</div>
		
	<div id="tagline">
		<h2>Real-Time Coding Challenges</h2>
		<p>Next Event: University of Colorado EEF Challenge: Spring Semester, 2011.</p>
	</div>
	</div>
	
    <div id="bannersection">
    	<div class="cenwrap">
    	<div id="banner" class="yui-g">
			<div class="yui-u first"></div>
			<div id="userbar" class="yui-u">
				<ul>
				<?php
				if(isset($user)) {
					echo '<li>',html::anchor('user/'.$user->id,$user->name()),'</li>';
					echo '<li>',html::anchor('settings','Settings'),'</li>';
					echo '<li>',html::anchor('logout','Logout'),'</li>';
				}
				else {
					echo '<li>',html::anchor('login','Login'),'</li>';
					echo '<li>',html::anchor('register','Register'),'</li>';
				}
				?>
				</ul>
			</div>
		</div>
    	<ul id="topnavbar" class="cenwrap"> 
			<li class="dim"><?php echo html::anchor('','Home'); ?></li> 
			<li><?php echo html::anchor('gettingstarted','Getting Started'); ?></li>  
			<li><?php echo html::anchor('challenges','Challenges'); ?></li> 
			<li><?php echo html::anchor('servers','Servers'); ?></li> 
			<?php
				if(isset($user) && $user->has_role('admin')) {
					echo '<li class="admin">',html::anchor('users','Users'),'</li>';
					echo '<li class="admin">',html::anchor('comments','Comments'),'</li>';
				}
			?>
			<li class="rightend"><?php echo html::anchor('scoreboard','Scoreboard'); ?></li> 
		</ul>
		</div>
	</div>
	
	<?php /*
	<div class="cenwrap">
		<div id="gammasection" class="yui-ge">
			<div id="breadcrumb" class="yui-u first">HOME >> Breadcrumb</div>
			<div class="yui-u"></div>		
		</div>
	</div>
	*/ ?>
	
</div> <!-- #hd -->

<div id="bd">
	<div class="cenwrap">
	<div id="yui-main">
	<?php
	if(isset($nosidebar)){
        
	}
	else {
		 echo '<div class="yui-b">';
	}
	?>

