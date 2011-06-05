</div>
</div> <!-- .cenwrap and #bd -->

<div id="ft">
<div id="footersection">
	<div class="yui-g">
	<!-- Column 1 -->
	<div class="yui-g first"><div class="yui-u first">
	<h2>Explore</h2>
	<ul>
	 <li><a href="/challenges">Challenges</a></li>
	 <li><a href="/scoreboard">Scoreboard</a></li>
	 <li><a href="/users">Players</a></li>
	 <li><a href="/bots">Bots</a></li>
	</ul>
	</div>
	<!-- Column 2 -->
	<div class="yui-u">
	<h2>Help and Questions</h2>
	<ul>
	 <li><a href="/gettingstarted">Getting Started</a></li>
	 <li><a href="/faq">FAQ</a></li>
	 <li></li>
	</ul>
	</div></div>
	<!-- Column 3 -->
	<div class="yui-g"><div class="yui-u first">
	<h2>Shortcuts</h2>
	<ul> 
	  <li><?php echo html::anchor('servers','Servers'); ?></li> 
	</ul>
	</div>
	<!-- Column 4 -->
	<div class="yui-u">
	<h2>About Code-Wars</h2>
	<div class="">website and contents &copy; <?php echo date('Y') ?></div>
	</div></div></div>


</div>
</div>

<?php
	if(isset($scripts)) {
		if(!is_array($scripts)) {
			$scripts = array($scripts);
		}
		foreach($scripts as $script) {
			echo html::script($script);
		}
	}

	$analytics = new View('common/analytics');
	echo $analytics;
?>
</body>
</html>
