<?
// ************************************************************
//
//  Copyright 2010 Department of Applied Mathematics (APPM) at the 
//		       University of Colorado at Boulder (UCB)
//
//  Revision History:
//  01/01/2011	jb		Updated file to have header
//
//  Confidential: Not for use or disclosure outside APPM-UCB without
//                        prior written consent.
//
// ***********************************************************
?>
        </div>
        <br class="clear"/>
        <div class="copyright">
	        CodeWars &copy; <?= date("Y") ?>, sponsored by CU Boulder's <a href="http://eef.colorado.edu">Engineering Excellence Fund</a> and the <a href="http://amath.colorado.edu">Department of Applied Mathematics</a>
        </div>
      </div>
    </div>
    <?php
	    if(isset($scripts)){
		    if(!is_array($scripts)){
			    $scripts = array($scripts);
		    }
		    foreach($scripts as $script){
			    echo html::script($script);
		    }
	    }

	    $analytics = new View('common/analytics');
	    echo $analytics;
    ?>
  </body>
</html>
