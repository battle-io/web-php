<?php
echo View::factory('common/header')
        ->set('title','Challenges');
?>
         
<!-- Main body goes here -->
<div id="content">
<h2>Challenges</h2>

<a name="connectfour" id="challenge1"></a>
<p><h4>Connect Four</h4>
Connect is a familiar two-player game. The game is 'solved', in that perfect play will always lead to a win or a forced draw, but there are many interesting algorithmic solutions. You can learn more about Connect Four here and find some resources to help you get started.<br />   
<div class="challenge-links">- Game Rules - Research - Servers - Bots -</div> 
</p>

<p><h4>Tanks</h4>
A simple demonstration game which asks users to determine the correct angle at which to fire a projectile at a given target. <br />
<div class="challenge-links">- Game Rules - Research - Servers - Bots -</div> 
</p>

<p><h4>Bullshit</h4>
Currently closed for a private challenge. Bullshit is a card game for which good solutions may need to incorporate card-counting, statistical analysis, and game theory. Completely conservative solutions are not possible, as it is improbable for a player to be able to win a game without making a false claim. <br />
<div class="challenge-links">- Game Rules - Research - Servers - Bots -</div> 
</p>
<br /><br />
<hr />
<h3>Upcoming challenges</h3>
<p><h4>Undercut</h4>
Undercut is a simple number game that involves predicting an opponent's move. Undercut has no graphics and only a very small of information is exchanged between players. Yet playing the game can require a great deal of complexity. <br /> 
<div class="challenge-links">- Game Rules - Research - Servers - Bots -</div> 
</p>

<p><h4>Chess</h4>
We would be remiss to create a coding competition playground without chess.<br />
<div class="challenge-links">- Game Rules - Research - Servers - Bots -</div> 
</p>


</div>
<!-- END Main body -->
         </div> <!-- .yui-b for main -->
    </div><!-- #yui-main -->


<?php echo View::factory('common/sidebar-basic'); ?>

<?php
echo View::factory('common/footer');
