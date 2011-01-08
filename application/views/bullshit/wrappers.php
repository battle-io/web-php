<?php
  echo View::factory('common/header')
    ->set('title', 'Bullshit Wrappers');
  echo View::factory("bullshit/submenu");
?>
<div id="content" class="home">
  <h2>C++</h2>
  <?php echo html::anchor('','C++ Wrapper'); ?>
  <br/>
  <h2>Java</h2>
  <?php echo html::anchor('','Java Wrapper'); ?>
  <br/>
  <h2>Matlab</h2>
  <?php echo html::anchor('','Matlab Wrapper'); ?>
  <br/>
  <h2>Python</h2>
  <?php echo html::anchor('','Python Wrapper'); ?>
  <br/>
  <h2>NodeJs</h2>
  <?php echo html::anchor('','NodeJs Wrapper'); ?>
</div>
<!-- END Main body -->
  </div> <!-- .yui-b for main -->
</div><!-- #yui-main -->
<?php
  echo View::factory('common/sidebar-basic');
  echo View::factory('common/footer');
