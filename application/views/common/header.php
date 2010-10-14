<!DOCTYPE html>
<head>
<title><?php echo $title ?> - Code-Wars</title>
<?php
	$style = array
	(
	'http://yui.yahooapis.com/combo?2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css',
	'css/cwglobal'
	);
	if(isset($css)) {
		$style = array_merge($style,$css);
	}
	echo html::stylesheet(
		$style,
		array_fill(0,count($style),'screen')
	);
?>
</head>
<body class="yui-skin-sam">
<div id="doc4" class="yui-t6">
<!-- id hd is the first YUI horizontal stack, the masthead -->
<div id="hd">
    <div id="headersection" class="yui-g">
    	<div id="cw-topbar" class="yui-u first">
	    	Code-wars
		</div>
	    <div class="yui-u">
		   	<ul id="topnavbar"> 
				<li><a href="#">Home</a></li> 
				<li><a href="#">Getting Started</a></li> 
				<li><a href="#">Weblog</a></li> 
				<li><a href="#">Community</a></li> 
				<li><a href="#">Wrappers</a></li> 
			</ul>
		</div>
	</div>
	
    <div id="bannersection">	
    	<div id="tagline">Real-Time Coding Challenges</div>
	</div>
	
	<div id="gammasection" class="yui-ge">
		<div id="breadcrumb" class="yui-u first">HOME >> Breadcrumb</div>
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
</div> <!-- #hd -->
