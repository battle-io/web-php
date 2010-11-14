<!-- Move this to a Sidebar view?  -->
<div id="sidebar" class="yui-b">
	<!-- sidebar content goes here -->
	<div class="widget">
	<h4><?php echo html::anchor('gettingstarted','Getting started') ?></h4>
	<ul>
	<?php
		echo '<li>',html::anchor('gettingstarted#register','Register'),'</li>';
		echo '<li>',html::anchor('gettingstarted#pick','Pick a Challenge'),'</li>';
		echo '<li>',html::anchor('gettingstarted#download','Download a Starter Bot'),'</li>';
		echo '<li>',html::anchor('gettingstarted#connect','Connect and Compete!'),'</li>';
	?>
	</ul>
	</div>
	
	<h4>Games and Challenges</h4>
	<div id="game-1" class="game"><h5>Connect 4</h5></div>
	<div id="game-2" class="game"><h5>Tanks</h5></div>
	<div id="game-3" class="game"><h5>Undercut</h5></div>
	<div id="game-4" class="game"><h5>EEF Challenge</h5></div>
	
	<div class="widget" style="margin-top:15px;">
	<h4>Learn more</h4>
	<p>You can find out more about how Code-Wars works and what we're all about by reading the FAQ and browsing the community forums.	</p>
	</div>  <!-- .widget -->
	
</div> <!-- .yui-b for sidebar -->

