<?php
echo View::factory('common/header')
        ->set('title','Game Servers');
?>
<h3>Game Servers</h3>
<h4>This is the Servers Page - Lists all the servers</h4>
<?php
	echo '<ul>';
	foreach($servers as $server) {
		echo '<li>',
			html::anchor($server->uri(),$server->name),
			' ',
			$server->online?'Online':'Offline',
			'<ul>',
				'<li>Number of Bots ',$server->bots->count_all(),'</li>',
			'</ul>';
	}
	echo '</ul>';
?>

<?php
echo View::factory('common/footer');
//echo View::factory('profiler/stats');
