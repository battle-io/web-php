<?php
echo View::factory('common/header')
	->set('title','Home')
	->set('layout','nosidebar');
?>
         
<!-- Main body goes here -->
<div id="content" class="home">
<h2 class="punch">Code-wars is a social community centered around algorithms and coding. Individuals and teams compete to solve problems in the form of games and competitions. Contestants are scored and ranked by their ability to outperform others.</h2>

<h2>Code-wars is different from other online coding challenges.</h2>

<div class="yui-g">
	<div class="yui-u first">
		<h4>Flexible Infrastructure</h2>
		<div class="checkbox"><ul>
			<li>Use any language or computing environment</li>
			<li>Work alone or in a team</li>
			<li>Your code never leaves your computer</li>
		</ul></div>
	</div>
	<div class="yui-u">
		<h4>Smarter Challenges</h4>
		<div class="checkbox"><ul>
		<li>All competitions take place in real time</li>
		<li>Designed to encourage innovation</li>
		<li>No one solution is best</li>
		</ul></div>
	</div>
</div>

<h2>Get Started</h2>
<p style="margin:5px 0;">Use our Start Wizard to get going, or learn more about our goals</p>

<h2>Learn more</h2>
	<p>You can find out more about how Code-Wars works and what we're all about by reading the FAQ and browsing the community forums.	</p>
	
<?php 
/*
<p>Give it a shot! 
<ul>
<li>Learn about different types of computer algorithms to solve problems and tasks!</li> 
<li>Network with programmers around the world with similar interests!</li>
<li>Test your skills and knowledge and earn recognition amongst your peers!</li>
</ul>
<ul>
	<li><?php echo html::anchor('/login','Login') ?></li>
	<li><?php echo html::anchor('/register','Register') ?></li>
</ul>
</p>
*/ 
?>

</div>
<!-- END Main body -->
         </div> <!-- .yui-b for main -->
    </div><!-- #yui-main -->

<?php
// echo View::factory('common/sidebar-basic');
?>

<?php
echo View::factory('common/footer');
?>

