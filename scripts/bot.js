jQuery(function($) {
  $('.stats span').click(function() {
    var $this = $(this);
    if('Show History' == $this.text()) {
      $this.parent().find('div').show('fast');
      $this.text('Hide History');
    }
    else {
      $this.parent().find('div').hide('fast');
      $this.text('Show History');
    }
      
  });
});
