!function ($) {

  $(function(){
 	


	// datepicker
	$(".datepicker-input").each(function(){ $(this).datepicker({format:'yyyy-mm-dd'});});

	
	
	
	// slim-scroll
	$('.no-touch .slim-scroll').each(function(){
		var $self = $(this), $data = $self.data(), $slimResize;
		$self.slimScroll($data);
		$(window).resize(function(e) {
			clearTimeout($slimResize);
			$slimResize = setTimeout(function(){$self.slimScroll($data);}, 500);
		});
	});

	

	

	// fontawesome
	$(document).on('click', '.fontawesome-icon-list a', function(e){
		e && e.preventDefault();
	});

	
	


  });
}(window.jQuery);