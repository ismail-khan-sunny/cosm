
function delete_content_image(burl){
	var id = $('#ContentId').val();
	if(confirm('Are you sure?')){
		$.ajax({
			type : 'POST',
			url : burl,		
			data: {contentid:id},
			success : function(data) {
				$('.content_image').remove();
				$('#ContentPreImage').val('');
			}
		});
	}
}