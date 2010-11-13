<?php
echo View::factory('common/header')
        ->set('title',$server->name.' Server');
?>
<h2><?php echo html::chars($server->name)?></h2>
<h3>This is the Server Page</h3>
<?php
	$bots = $server->bots->find_all();
	echo '<ul>';
	foreach($bots as $bot) {
		echo '<li>',
			html::anchor($bot->uri(),$bot->name),
			' by ',
			html::anchor($bot->user->uri(),$bot->user->name()),
			'</li>';
	}
	echo '</ul>';
?>

<?php
echo View::factory('common/footer');
//echo View::factory('profiler/stats');
