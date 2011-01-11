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
