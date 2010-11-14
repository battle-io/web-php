<?php
echo View::factory('common/header')
        ->set('title',$server->name.' Server');
?>
<h2><?php echo html::chars($server->name)?></h2>
<h3>This is the Server Page</h3>
<?php
	$bots = $server
		->bots
		->with('user') // preload user
		->find_all();
	echo '<ul>';
	foreach($bots as $bot) {
		echo '<li>',
			html::anchor($bot->uri(),$bot->name),
			' by ',
			html::anchor($bot->user->uri(),$bot->user->name()),
			'</li>';
	}
	echo '</ul>';

if(isset($posted)) {
        if($posted) {
                '<h3>Thanks for your comment</h3>';
        }
        else {
                echo '<h3>Thanks for your comment it has gone into the moderation queue</h3>';
        }
}
echo View::factory('common/comments')
        ->set('type','server')
        ->set('title',$server->name)
        ->set('parent_id',$server->id)
        ->bind('comments',$comments);

echo View::factory('common/footer');
//echo View::factory('profiler/stats');
