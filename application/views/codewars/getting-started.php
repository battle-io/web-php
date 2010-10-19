<?php echo $header ?>
         
<!-- Main body goes here -->
<div id="content">
<h3>Getting Started</h3>

<p><h4>Step 1: Create a code-wars account.</h4>
All you need is a Username and Email address to start playing. 
<?php echo html::anchor('/register','Register') ?>
</p>

<p><h4>Step 2: Register a bot!</h4>  
Use the Code-Wars bot generator to create a new bot for competition.      
</p>

<p><h4>Step 3: Start Coding With a Wrapper.</h4>
Wrappers help you set up the framework for your code to easily connect to the game server.
</p>

<p><h4>Step 4: Code and Play!</h4>
This is the fun part! You can code your algorithm from scratch, or use one of our sample bots as a starting template.
</p>


</div>
<!-- END Main body -->
         </div> <!-- .yui-b for main -->
    </div><!-- #yui-main -->


<!-- Move this to a Sidebar view?  -->
<div id="sidebar" class="yui-b">
	<!-- sidebar content goes here -->
	<div class="widget">
	<h1>This is the sidebar</h1>
	<p>Include various widgets and navigation here.</p>
	</div>
	
	<h2>Games and Challenges</h2>
	<div id="game-1" class="game"><h1>Connect 4</h1></div>
	<div id="game-2" class="game"><h1>Tanks</h1></div>
	<div id="game-3" class="game"><h1>Undercut</h1></div>
	<div id="game-4" class="game"><h1>EEF Challenge</h1></div>
	
	<div class="widget" style="margin-top:15px;">
	<h1>Lorem Ipsum</h1>
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
	</div> 
	
</div> <!-- .yui-b for sidebar -->

<?php echo $footer ?>
