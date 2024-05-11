var base_url = $('head').data('baseurl');

var no_image_url = base_url+'/img/no-image.png';

var loading_image_url = base_url+'/img/ajax-loader.gif';



$(function() {

		$('.copy4').html('<input class="simple" type="radio" value="active" name="data[ProductImage][status][]">');

        var scntDiv = $('#tr_scents');

        var i = $('.count').length;

        

        $('#addScnt').on('click', function() {

    		var copyhtml1 = '<img class="image_'+i+'" width="100" alt="" src="'+no_image_url+'">';

    		var copyhtml2 = '<div class="form-group col-md-12 required productimage"><label for="ProductImageImage">Image</label><input id="ProductImageImage" type="file" required="required" onchange="display_image(this,'+i+')" name="data[ProductImage][image][]"></div><div class="form-group col-md-2"><label for="ProductImagePosition">Position</label><input id="ProductImagePosition" class="form-control" name="data[ProductImage][position][]" type="text" value='+i+'></div>';

    		var copyhtml3 = $('.copy3').html();

    		var copyhtml4 = '';

    		var html = '<tr class="tr'+i+'"><td>'+copyhtml1+'</td><td>'+copyhtml2+'</td><td><button type="button" class="btn btn-rounded btn-sm btn-icon btn-danger" onclick="removetr('+i+')"><i class="fa fa-times text-white text"></i></button></td></tr>';

            $(html).appendTo(scntDiv);

            i= i+1;

            return false;

        });

});



function loading_image(){

	var html = '<div style="width:100px; margin:auto;"><img src="'+loading_image_url+'"></div>';

	return html;

}



function removetr(i){

	$('.tr'+i).remove();

}



function removeImageFromdbWithTr(i,productimageid){
	url = base_url+'/products/remove_from_db/';
	$('.tr'+i).html('<tr class="tr'+i+'"><td colspan="5" class="text-center"><img src="'+base_url+'/img/ajax-loader.gif"></td></tr>')
	$.ajax({
 		type : 'POST',
 		url : url,
 		data: { id: productimageid,model:'ProductImage'},
 		success : function(data) {
 			$('.tr'+i).remove();
		}
	});
}






function display_image(input,sl){

	if (input.files && input.files[0]) {

		var reader = new FileReader();

		

		reader.onload = function(e) {

			

			$('.image_'+sl)

			.attr('src', e.target.result);

		};

		reader.readAsDataURL(input.files[0]);

	}

}



$("#relatedproductstab").click(function() {

	// url = base_url+'/admin/products/related_product/';

	// var cat_id = $('#ProductCategoryId').val();

	// $('#relatedproducts').html(loading_image());

	// $.ajax({

 // 		type : 'get',

 // 		url : url,

 // 		data: { category_id: cat_id},

 // 		success : function(data) {

 // 			$('#relatedproducts').html(data);

	// 	}

	// });

});



function slug_generator(){



}



$("#ProductName").on('keyup', function() {

	url = base_url+'/admin/products/slug_generator/';

	var product_name = $('#ProductName').val();

	$.ajax({

 		type : 'POST',

 		url : url,

 		data: { name: product_name},

 		success : function(data) {

 			$('#ProductSlug').val(data);

		}

	});

});