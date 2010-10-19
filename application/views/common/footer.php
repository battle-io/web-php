<<<<<<< HEAD

</div></div> <!-- .cenwrap and #bd -->

=======
>>>>>>> eeb457608811d2d8022b49049e3745fd0bafdf70
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
