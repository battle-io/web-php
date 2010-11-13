<?php
echo View::factory('common/header')
        ->set('title','Game Servers');
?>
<h2>Game Servers</h2>
<h3>This is the Servers Page - Lists all the servers</h3>
<?php
	echo '<ul>';
	foreach($servers as $server) {
		echo '<li>',
			html::anchor($server->uri(),$server->name),
			' ',
			$server->online?'Online':'Offline',
			'<ul>',
				'<li>Number of Bots ',$server->bots->count_all(),'</li>',
			'</li>';
	}
	echo '</ul>';
?>

<?php
echo View::factory('common/footer');
//echo View::factory('profiler/stats');
