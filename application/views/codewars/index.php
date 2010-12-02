<?php
echo View::factory('common/header')
	->set('title','Home');
?>
         
<!-- Main body goes here -->
<div id="content" class="home">
<h2 class="punch">Code-wars is a social community centered around algorithms and coding. Individuals and teams compete to solve problems in the form of games and competitions. Contestants are scored and ranked by their ability to outperform others.</h2>
<p style="margin:5px 0;">Code-wars is different from other online coding challenges.</p>

<div class="yui-g">
	<div class="yui-u first">
		<h4>Infrastructure</h2>
		Use any language or computing environment<br />
		Work alone or in a team<br />
		Your code never leaves your computer<br />
	</div>
	<div class="yui-u">
		<h4>Challenges</h4>
		All competition take place in real time<br />
		Innovation and experimentation encouraged<br />
		Advanced challenges that have no perfect solution<br />
	</div>
</div>
<p style="margin:5px 0;">Use our Start Wizard to get going, or learn more about our goals</p>

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
echo View::factory('common/sidebar-basic');
?>

<?php
echo View::factory('common/footer');
?>

