</div></div> <!-- .cenwrap and #bd -->

<hr/>
<div id="ft">
	<div id="footersection">&copy; <?php echo date('Y') ?></div>
</div>
</div>

<?php
	if(isset($scripts)) {
		echo html::script($scripts);
	}

	$analytics = new View('common/analytics');
	echo $analytics;
?>
</body>
</html>
