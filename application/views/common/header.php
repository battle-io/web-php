<!DOCTYPE html>
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
<div id="doc3" class="yui-t6">
<!-- id hd is the first YUI horizontal stack, the masthead -->
<div id="hd">
	<div id="headersection" class="cenwrap">
	    <div class="yui-ge">
	    	<div id="cw-topbar" class="yui-u first"> Code-wars </div>
		    <div class="yui-u"></div>
		</div>
		
	<div id="tagline">
		<p>Real-Time Coding Challenges</p>
		<p>Next Event: University of Colorado EEF Challenge: January 22-23rd, 2011.</p>
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
			<li><a href="/">Home</a></li> 
			<li><a href="/gettingstarted">Getting Started</a></li> 
			<li><a href="#">Weblog</a></li> 
			<li><a href="#">Community</a></li> 
			<li><a href="#">Wrappers</a></li> 
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
         <div class="yui-b">


