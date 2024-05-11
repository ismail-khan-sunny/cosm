var base_url = $('head').data('baseurl');

$(function() {
        // News Form
        
        var newstype = $('#NewsType').val();0
        alert(newstype);

        if(newstype=='File'){
        	displayNewsFileForm();
        }
        
        if(newstype=='Content'){
    		displayNewsContentForm();
    	}
        
        
        $('#NewsType').on('change', function(){
			var newstype = $('#NewsType').val();
			
        	if(newstype=='File'){
        		displayNewsFileForm();
        	}
        	
        	if(newstype=='Content'){
        		displayNewsContentForm();
        	}
        });
        
        
       // News Form
});

function displayNewsFileForm(){
	//$('#NewsFile').parent('div').attr('class','form-group col-md-12');
	$('#NewsFile').parent('div').show();
	$('#NewsImage').parent('div').hide();
	$('#newsAvaterImage').parent('div').hide();
	$('#NewsDescription').parent('div').hide();
}

function displayNewsContentForm(){
	$('#NewsImage').parent('div').show();
	$('#newsAvaterImage').parent('div').show();
	$('#NewsDescription').parent('div').show();
	$('#NewsFile').parent('div').hide();
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


