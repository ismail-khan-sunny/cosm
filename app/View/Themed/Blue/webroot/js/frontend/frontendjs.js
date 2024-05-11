var base_url = '/nscms';// base url for js


/*
 * .ajax_page class are using for get href page link content by ajax
 *
 */
$('.carousel').carousel({
  interval: 2000
});


$(document).on("click", ".ajax_page", function(event) {	
	
	if ($(this).attr('href') == undefined) {
		url = $(this).find('a').attr('href');
	} else {
		url = $(this).attr('href');
	}

	$(this).parents().find('li').removeClass('active');
	
	$(this).addClass('active');
	$(this).parent('li').addClass('active');
	
	var is_modal = false;
	if ($(this).data('target') != undefined) {
		var modal_id = $(this).data('target');
		is_modal = true;
		var loading_html = '<div class="center"><i class="fa fa-spinner fa-spin fa-4x"></i><p class="text-warning">Loading...</p></div>';
		$('#modal').find('.modal-content').html(loading_html);
	} else {
		$(".overlay").show();
	}
	
	
	$.ajax({
		type : 'GET',
		url : url,
		success : function(data) {

			if (is_modal) {
				$('#modal').find('.modal-content').html(data);
			} else {
				$("#page-container").html(data);					
				changeUrlWithoutRefresh('NS-CMS',url);
			}

			//hide flashMessage
			$(".overlay, #flashMessage").hide();
		}
	});
	event.preventDefault();
});

function changeUrlWithoutRefresh(pageTitle,url){
	$("title").html(pageTitle);
 	window.history.pushState("", pageTitle, url);
 }

$(document).on("click", ".ajax_delete", function(event) {
	
	if(confirm('Are you want to Delete?')){
		if ($(this).attr('href') == undefined) {
		url = $(this).find('a').attr('href');
		} else {
			url = $(this).attr('href');
		}
		
		$(".overlay").show();
	
		$.ajax({
			type : 'POST',
			url : url,
			success : function(data) {		
				$("#content .vbox").html(data);	
				$(".overlay, #flashMessage").hide(); //hide flashMessage			
			}
		});
		
	}
	
	
	event.preventDefault();
});

/*
 * Overlay hidden by click
 */
$(document).on("click", ".overlay", function(event) {
	$(".overlay").hide();
});