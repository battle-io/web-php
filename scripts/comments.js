jQuery(function($) {
	$('.hijack').live('click',function() {
		var $el = $(this).closest('dl');
		var op = false;
		if($(this).hasClass('ham')) {
			op = 'ham';
		}
		else if($(this).hasClass('spam')) {
			op = 'spam';
		}
		if(op !== false) {
			$.post('/comments/mark_as',{
				comment_id:$el.attr('id').split('_')[1],
				mark_as:op
			},function(data) {
				$el.replaceWith(data);
			});
		}

		return false;
	});
});
