</div></div> <!-- .cenwrap and #bd -->

<div id="ft">
	<div id="footersection">&copy; <?php echo date('Y') ?></div>
</div>
</div>

<?php
	if(isset($scripts)) {
		if(!is_array($scripts)) {
			$scripts = array($scripts);
		}
		foreach($scripts as $script) {
			echo html::script($script);
		}
	}

	$analytics = new View('common/analytics');
	echo $analytics;
?>
</body>
</html>
