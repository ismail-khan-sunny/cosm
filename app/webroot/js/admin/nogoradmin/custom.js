var base_url = $('head').data('baseurl');
var no_image_url = base_url+'/img/no-image.png';
var loading_image_url = base_url+'/img/ajax-loader.gif';

$(function() {
	$('.btn-metacontent').on('click',function(){
		$('.meta-content').toggle();
	});
});


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

function removeImageSrc(imgId,inputElement,preImage){
	$('#'+imgId).attr('src', no_image_url);
	$('#'+inputElement).val('');
	if(preImage!=null){
		$('#'+preImage).val('');
	}
}

function deleteImageFromDb(burl,id,element){

	if(confirm('Are you sure?')){
		$('#'+element).attr('src', loading_image_url);
		$.ajax({
			type : 'POST',
			url : burl,		
			data: {contentid:id},
			success : function(data) {
				$('#'+element).remove();
			}
		});
	}
}


function get_process(input,element){
	
	var dominionid = input.value;
	var burl = base_url+'/processes/get_process/'+dominionid;
	$.post(
		burl
	)
	.done(function( data ){
		$("#"+element).html(data);
	});
}

$('#item-box').slimScroll({
    height: '250px'
});

$('#member-box').slimScroll({
    height: '250px'
});


