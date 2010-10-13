<?php echo $header ?>
<div id="bd">
	<div id="yui-main">
         <div class="yui-b">
<!-- Main body goes here -->

This is the main body - explain what Code-Wars is here and entice the person to login or register
<ul>
<li><?php echo html::anchor('/login','Login') ?></li>
<li><?php echo html::anchor('/register','Register') ?></li>
</ul>
         
<!-- END Main body -->
         </div>
    </div>
<div class="yui-b">
<!-- Sidebar goes here -->
This is the sidebar -- include various widgets and navigation here. 
</div>
      
</div>
<?php echo $footer ?>
