function deleteImageFromDb(burl,id,element){

	if(confirm('Are you sure?')){
		$('#'+element).attr('src', loading_image_url);
		$.ajax({
			type : 'POST',
			url : burl,		
			data: {id:id},
			success : function(data) {
				$('#'+element).remove();
			}
		});
	}
}