jQuery(function($) {
	$('#roles').change(function() {
		$(this).closest('form').submit();
	});

	$('.user .roles>li').live('click',function() {
		var $el = $(this).closest('.user');
		$.post('/users/set_role',{
			user_id:$el.attr('id').split('_')[1],
			role_id:$(this).attr('class').split('_')[1],
		},function(data) {
			$el.replaceWith(data);
		});
	});
});
