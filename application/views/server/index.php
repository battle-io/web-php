<?php
echo View::factory('common/header')
        ->set('title',$server->name.' Server');
?>
<h3><?php echo html::chars($server->name)?></h3>
<h4>This is the Server Page</h4>
<?php
	if(isset($user)) {
		if(isset($errors)) {
			var_dump($errors);
		}
		echo form::open();
		echo form::label('bot','Bot'),form::input('bot','',array('id'=>'bot'));
		echo form::submit('sb','Register Bot');
		echo form::close();
	}
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
                '<h4>Thanks for your comment</h4>';
        }
        else {
                echo '<h4>Thanks for your comment it has gone into the moderation queue</h4>';
        }
}
echo View::factory('common/comments')
        ->set('type','server')
        ->set('title',$server->name)
        ->set('parent_id',$server->id)
        ->bind('comments',$comments);

echo View::factory('common/footer');
//echo View::factory('profiler/stats');
