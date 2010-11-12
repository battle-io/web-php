<?php
echo View::factory('common/header')
	->set('title','Home');
?>
         
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
         </div> <!-- .yui-b for main -->
    </div><!-- #yui-main -->

<?php
echo View::factory('common/sidebar-basic');
?>

<?php
echo View::factory('common/footer');
?>

