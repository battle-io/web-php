<hr/>
<div id="ft">&copy; <?php echo date('Y') ?></div>
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
