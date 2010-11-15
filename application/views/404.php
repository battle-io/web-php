<?php
echo View::factory('common/header')
        ->set('title','404 - Page Not Found');
?>
<h3 class="punch">The page you are looking for has gone missing. (404)<h3>
<?php
echo View::factory('common/footer');
