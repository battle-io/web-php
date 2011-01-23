<?php
echo View::factory('common/header')
        ->set('nosidebar',1)
        ->set('title',$bot->name.' Bot');
        
?>
<div id="botprofilepage">
<h3>Bot Profile for <?php echo html::chars($bot->name)?></h3>

<div class="yui-gd">

<div id="botinfo" class="yui-gd first">
	<div class="yui-u first leftinfo">
		Bot Name:<br />
		Author:<br />
		Challenge:<br />
		Coding Lanuage:<br />
		Created on:<br />
		Last online:<br/>
		Author's Notes:<br />
	</div>
	<div class="yui-u rightinfo" >
		<?php echo html::chars($bot->name)?><br />
		<?php echo html::anchor($bot->user->uri(),$bot->user->name()); ?><br />
		$challenge<br />
		$language<br />
		$created_date<br />
		$last_login<br />
		$author_notes<br />
	</div>
</div>

<div id="perfchart" class="yui-u">
Performance chart here.
</div>

</div>
<ul>
<?php
	echo '<li>server ',html::anchor($bot->server->uri(),$bot->server->name),'</li>';
?>
</ul>

<?php if(isset($stats)) { ?>
<h3>Last <?php echo count($stats),
  ' ',
  ucfirst(Inflector::singular('games',count($stats)));
 ?> of <?php echo $game_count ?></h3>
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
?>
</div>

<?php
echo View::factory('common/footer')
  ->set('scripts',array(
    'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js',
    'scripts/bot.js'
  ));
//echo View::factory('profiler/stats');
?>