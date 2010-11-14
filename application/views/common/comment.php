<?php
	echo '<dl id="comment_',$comment->id,'">',
		'<dt>',
		html::anchor($comment->user->uri(),
			$comment->user->name()),
	        ' Posted: ',date('F jS, Y', $comment->date),
		'</dt>',
       		'<dd>',html::chars($comment->text),'</dd>';
	if($admin) {
		echo '<dt>admin</dt>';
		echo '<dd class="admin">',
			'<em class="hijack delete">delete</em> | ',
			'<em class="hijack spam">mark as spam</em> | ',
			'etc',
			'</dd>';
	}
	echo '</dl>';
