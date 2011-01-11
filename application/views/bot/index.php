<?php
echo View::factory('common/header')
        ->set('title',$bot->name.' Bot');
?>
<h3><?php echo html::chars($bot->name)?></h3>
<h4>This is the Bot Page</h4>
<ul>
<?php
	echo '<li>server ',html::anchor($bot->server->uri(),$bot->server->name),'</li>';
	echo '<li>the bot was created by ',html::anchor($bot->user->uri(),$bot->user->name()),'</li>';
?>
</ul>

<?php if(isset($stats)) { ?>
<h3>Last 10 Games</h3>
<ol class="stats">
<?php
  foreach($stats as $game) {
    echo '<li>',$game->DatePlayed,' ',
      html::anchor($game->bot1->uri(),$game->bot1->name),', ',
      html::anchor($game->bot2->uri(),$game->bot2->name),', ',
      html::anchor($game->bot3->uri(),$game->bot3->name),', ',
      html::anchor($game->bot4->uri(),$game->bot4->name),
      ' Winner: ',
      html::anchor($game->winner->uri(),$game->winner->name),' ',
      '<span>Show History</span>',
      '<div class="history">',
      '<pre>',$game->GameHistory,'</pre>',
      '</div>',
      '</li>';
  }
?>
</ol>
<?php } ?>


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
echo View::factory('common/footer')
  ->set('scripts',array(
    'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js',
    'scripts/bot.js'
  ));
//echo View::factory('profiler/stats');
