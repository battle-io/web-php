jQuery(function($) {
	$('#comments .admin .hijack').live('click',function() {
		var $el = $(this).closest('dl');
		var op = false;
		if($(this).hasClass('spam')) {
			op = 'spam';
		}
		else if($(this).hasClass('delete')) {
			op = 'deleted';
		}

		if(false === op) {
			return false;
		}
		$.post('/comments/mark_as',{
			comment_id:$el.attr('id').split('_')[1],
			mark_as:op,
			local_template:true
		},function(data) {
			$el.replaceWith(data);
		});
		return false;
	});
});
