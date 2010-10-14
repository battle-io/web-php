<?php echo $header ?>

<!-- maybe move these lines to the bottom of $header -->
<div id="bd">
	<div id="yui-main">
         <div class="yui-b">
         
<!-- Main body goes here -->
<div id="content">
<h3>Code-wars is a social community centered around algorithms and coding. Individuals and teams compete to solve problems in the form of games and competitions. Contestants are scored and ranked by their ability to outperform others.</h3>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

<ul>
	<li><?php echo html::anchor('/login','Login') ?></li>
	<li><?php echo html::anchor('/register','Register') ?></li>
</ul>
         

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

</div>
<!-- END Main body -->
         </div>
    </div>


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
	

	
</div>


<!--  maybe move these lines to the top of the $footer -->
</div>
<?php echo $footer ?>
