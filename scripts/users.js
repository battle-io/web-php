jQuery(function($) {
	$('em').live('click',function() {
		$(this).text('loading...');
		var $el = $(this).closest('li');
		var id = $el.attr('id').split('_')[1];
		$.post('users/set_role',{
				user_id:id,
				role:'admin'
			},function(data) {
				$el.find('em').replaceWith(data);
			});
	});
});
