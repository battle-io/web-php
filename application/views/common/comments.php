<h4>Comments for <?php echo $title ?></h4>
<div id="comments">
<?php
	$admin = false;
	$loggedin = false;
	if(isset($user)) {
		$loggedin = true;
		$admin = $user->has_role('admin');
	}
?>


<?php
	foreach($comments->comments as $comment) {
		echo View::factory('common/comment')
			->bind('comment',$comment)
			->bind('admin',$admin);
	}

	$pagination = Pagination::factory(array(
		'current_page'  => array('source'=>'route', 'key'=>'page'),
		'total_items'   => $comments->total,
		'items_per_page'        => $comments->per_page,
		'auto_hide'	=> true,
	));

	echo $pagination->render();

	if($loggedin) {
		echo form::open();
		echo form::textarea('text');
		echo form::submit('s','Post');
		echo form::close();
	}

	echo '</div>';
