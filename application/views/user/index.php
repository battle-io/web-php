<?php
echo View::factory('common/header')
        ->set('title',$profile->name());
?>
<h3><?php echo html::chars($profile->name())?></h3>
<ul>
<?php
	if(isset($user) && $profile->id == $user->id) {
		echo '<li>Welcome ',$user->fullname(),' this is your profile page</li>';
		echo '<li>Your Bot Key is: ',$profile->key,'</li>';
	} else {
		echo '<li>This is the profile page</li>';
	}
?>
</ul>

<h4>Bots</h4>
<?php
	$bots = $profile
		->bots
		->with('server') // pre load the server info
		->find_all();
	$servers = array();
	$bots_by_server = array();
	foreach($bots as $bot) {
		if(!isset($servers[$bot->server->id])) {
			$servers[$bot->server->id] = $bot->server;
			$bots_by_server[$bot->server->id] = array();
		}
		array_push($bots_by_server[$bot->server->id], $bot);
	}

	function compare_names($a, $b) {
		return strcmp($a->name,$b->name);
	}
	uasort($servers, 'compare_names');

	echo '<ul class="bots">';
	foreach($servers as $server_id => $server) {
		echo '<li>',html::anchor($server->uri(),$server->name),' ',($server->online?'Online':'Offline'),'<ul>';
		uasort($bots_by_server[$server_id], 'compare_names');
		foreach($bots_by_server[$server_id] as $bot) {
			echo '<li>',html::anchor($bot->uri(),$bot->name),' ',($bot->online?'Online':'Offline'),'</li>';
		}
		echo '</ul></li>';
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
        ->set('type','user')
        ->set('title',$profile->name())
        ->set('parent_id',$profile->id)
        ->bind('comments',$comments);
echo View::factory('common/footer')
	->set('scripts',array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js',
		'scripts/comment_admin.js',
	));
//echo View::factory('profiler/stats');
