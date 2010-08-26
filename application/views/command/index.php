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
	foreach($servers as $name=>$command) {
		echo '<li>',$name,' - ',$command,'</li>';
	}
?>
</ul>

</div>
</body>
</html>
