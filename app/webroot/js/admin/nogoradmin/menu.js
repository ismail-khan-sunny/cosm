var base_url = $('head').data('baseurl');

$(function() {
        // News Form
        
        var menutype = $('#MenuType').val();

        if(menutype=='file'){
        	displayMenuFileForm();
        }
        
        if(menutype=='content'){
    		displayMenuContentForm();
    	}
    	
        if(menutype=='external_link'){
    		displayMenuExternalLinkForm();
    	}
        
        
        $('#MenuType').on('change', function(){
			var menutype = $('#MenuType').val();
			
        	if(menutype=='file'){
	        	displayMenuFileForm();
	        }
	        
	        if(menutype=='content'){
	    		displayMenuContentForm();
	    	}
	    	
	        if(menutype=='external_link'){
	    		displayMenuExternalLinkForm();
	    	}
        });
        
        
       // News Form
});

function displayMenuFileForm(){
	$('#MenuUrl').parent('div').hide();
	$('#MenuContentId').parent('div').hide();
	$('#addContent').parent('div').hide();
	$('#MenuFile').parent('div').show();
}

function displayMenuContentForm(){
	$('#MenuUrl').parent('div').hide();
	$('#MenuFile').parent('div').hide();
	$('#MenuContentId').parent('div').show();
	$('#addContent').parent('div').show();
}

function displayMenuExternalLinkForm(){
	$('#MenuUrl').parent('div').show();
	$('#MenuContentId').parent('div').hide();
	$('#addContent').parent('div').hide();
	$('#MenuFile').parent('div').hide();
}

function displayImage(input,element){	
	/*$image = document.getElementById('PostImage').value;*/
	var filename = input.files[0]['name'];

	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function(e) {
			$('#'+element)
			.attr('src', e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
		$('#'+element).show();
	}
	
}

$(document).on("click", ".btn-content", function(event) {	

 	if ($(this).attr('href') == undefined) {
 		url = $(this).find('a').attr('href');
 	} else {
 		url = $(this).attr('href');
 	}
 	
 	var is_modal = false;
 	if ($(this).data('target') != undefined) {
 		var modal_id = $(this).data('target');
 		is_modal = true;
 		var loading_html = '<div class="center" style="width:50px; margin:auto;"><i class="fa fa-spinner fa-spin fa-4x"></i><p class="text-warning">Loading...</p></div>';
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
 				$("#content .vbox").html(data);
 				changeUrlWithoutRefresh('Title',url);
 			}

			//hide flashMessage
			$(".overlay, #flashMessage").hide();
		}
	});
 	event.preventDefault();
 });


