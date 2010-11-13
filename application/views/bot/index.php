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
echo View::factory('common/footer');
