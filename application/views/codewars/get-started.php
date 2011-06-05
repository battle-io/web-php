<?php
echo View::factory('common/header')
        ->set('title','Get Started');
?>
         
<!-- Main body goes here -->
<div id="content">
<h2>Getting Started</h2>

<h3>New! Use our Wizard to get started!</h3> 

<a name="register" id="register"></a>
<p><h4>Step 1: Create a code-wars account.</h4>
All you need is a Username and Email address to start playing. 
<?php echo html::anchor('/register','Register') ?>
</p>

<a name="pick" id="pick"></a>
<p><h4>Step 2: Register a bot!</h4>  
Use the Code-Wars bot generator to create a new bot for competition.      
</p>

<a name="download" id="download"></a>
<p><h4>Step 3: Start Coding With a Wrapper.</h4>
Wrappers help you set up the framework for your code to easily connect to the game server.
</p>

<a name="connect" id="connect"></a>
<p><h4>Step 4: Code and Play!</h4>
This is the fun part! You can code your algorithm from scratch, or use one of our sample bots as a starting template.
</p>


</div>
<!-- END Main body -->
         </div> <!-- .yui-b for main -->
    </div><!-- #yui-main -->


<?php echo View::factory('common/sidebar-basic'); ?>

<?php
echo View::factory('common/footer');
