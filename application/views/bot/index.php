<?php
echo View::factory('common/header')
        ->set('title',$bot->name.' Bot');
?>
<h2><?php echo html::chars($bot->name)?></h2>
<h3>This is the Bot Page</h3>
<ul>
<?php
	echo '<li>server ',html::anchor($bot->server->uri(),$bot->server->name),'</li>';
	echo '<li>the bot was created by ',html::anchor($bot->user->uri(),$bot->user->name()),'</li>';
?>
</ul>


<?php
if(isset($posted)) {
	if($posted) {
		'<h3>Thanks for your comment</h3>';
	}
	else {
		echo '<h3>Thanks for your comment it has gone into the moderation queue</h3>';
	}
}
echo View::factory('common/comments')
	->set('type','bot')
	->set('title',$bot->name)
	->set('parent_id',$bot->id)
	->bind('comments',$comments);
echo View::factory('common/footer');
echo View::factory('profiler/stats');
