<!DOCTYPE html>
<head>
<title>Code-Wars - Command Center</title>
<?php
	echo html::stylesheet('css/command','screen');
?>
</head>
<body>
<div class="container">
<h1>Code-Wars - Command Center</h1>

<h2>Servers</h2>
<ul>
<?php
	foreach($servers as $name=>$info) {
		echo '<li>',html::anchor('/command/start?command='.$name,$name.' - '.$info['command']),'</li>';
		if(isset($info['running'])) {
			echo '<ul>';
			foreach($info['running'] as $pid) {
				echo '<li>',html::anchor('/command/kill/'.$pid,$pid),'</li>';
			}
			echo '</ul>';
		}
	}
?>
</ul>

</div>
</body>
</html>
