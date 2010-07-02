<!DOCTYPE html>
<head>
<title><?php echo $title ?> - Code-Wars</title>
<?php
	$style = array('http://yui.yahooapis.com/combo?2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css');
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
    <h1 id="cw-topbar">
    	Code-wars
    </h1>
	<div id="headerbar">
		Real-Time Coding Challenges
	</div>
</div> <!-- #hd -->
