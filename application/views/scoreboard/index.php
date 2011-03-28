<?php
echo View::factory('common/header')
        ->set('title','Scoreboard');
?>
<h3>Scoreboard</h3>
<h4>Current performance statistics summary for Bots and Users</h4>

<!-- END Main body -->
         </div> <!-- .yui-b for main -->
    </div><!-- #yui-main -->

<?php
//echo View::factory('scoreboard/stats');
echo View::factory('common/footer');
?>
