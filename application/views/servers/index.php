<?php
echo View::factory('common/header')
        ->set('title','Game Servers');
?>
<h3>Game Servers</h3>
<h4>List of active Game Servers</h4>

<div id="servertable">
<div class="yui-gc tableheader">
	<div class="yui-g first">
		<div class="yui-u first">Server Name</div>
		<div class="yui-u">Challenge</div>
	</div>
	<div class="yui-g">
		<div class="yui-u first">Status</div>
		<div class="yui-u">Registered Bots</div>
	</div>
</div>

<?php
	echo '<div class="yui-gc">';
	foreach($servers as $server) {
		echo '<div class="yui-g first"><div class="yui-u first">',
			html::anchor($server->uri(),$server->name),
			'</div><div class="yui-u">(Bullshit)</div></div>',
			'<div class="yui-g"><div class="yui-u first">',
			$server->online?'Online':'Offline',
			'</div><div class="yui-u center">',
				$server->bots->count_all(),
			'</div></div>';
	}
	echo '</div>';
?>
</div>
<?php
echo View::factory('common/footer');
//echo View::factory('profiler/stats');
?>
