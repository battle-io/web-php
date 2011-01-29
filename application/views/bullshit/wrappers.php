<?php
// ************************************************************
//
//  Copyright 2010 Department of Applied Mathematics (APPM) at the 
//		       University of Colorado at Boulder (UCB)
//
//  Revision History:
//  01/01/2011	jb		Updated file to have header
//  01/28/2011  jb    Updates filename and description for the Java wrapper
//
//  Confidential: Not for use or disclosure outside APPM-UCB without
//                        prior written consent.
//
// ***********************************************************
?>
<?php
  echo View::factory('bullshit/common/header')
    ->set('title','Bullshit Wrappers');
?>
<h2>
  What are the wrappers?
</h2>
<p>
  The wrappers are portions of code which should make youre life easier through giving you key portions of your bot (such as the socket connector). This is not a competition on programming after all as much as it is a competition based on the logic you implement for your bot. We want you to be able to hit the ground running and get something going quickly not spend a lot of time fighting errors attempting to connect to our system.
</p>
<p>
  Below are a few wrappers which we have provided for you. However, if you feel you must you can always write one for yourself which will, of course, take more time to complete.
</p>
<h2>C++</h2>
<?php echo html::anchor('','C++ Wrapper'); ?>
<br/>
<h2>Java</h2>
<?php echo html::anchor('/bullshit/wrappers/Java','Java Wrapper'); ?> (zip)
<br/>
The wrapper source code is located in the "src" folder, however the netbeans IDE can open it as an entire project.
<br/>
<h2>Matlab</h2>
<?php echo html::anchor('','Matlab Wrapper'); ?>
<br/>
<h2>Python</h2>
<?php echo html::anchor('','Python Wrapper'); ?>

<?php
  echo View::factory('bullshit/common/footer');
