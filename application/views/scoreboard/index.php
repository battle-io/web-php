<?php
echo View::factory('common/header')
        ->set('title','Scoreboard');
?>
<h3>Scorebaord</h3>
<h4>Current performance statistics summary for Bots and Users</h4>

<?php
//echo View::factory('scoreboard/stats');
echo View::factory('common/footer');
?>
