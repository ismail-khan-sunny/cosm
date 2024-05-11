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