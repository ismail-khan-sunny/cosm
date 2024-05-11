var base_url = $('body').data('baseurl');// base url for js

$( "li.list-group-item " ).draggable({
	cursor:'move',
	appendTo: "body",
	helper: "clone"
});

$(function() {
	$( "#editable-div-size" ).slider({
		range: "min",
		value: 6,
		min: 2,
		max: 12,
		slide: function( event, ui ) {	
			$("#div-size").text(ui.value);
			var editableId = $(".editable").attr('id');		
			var newClass = 'editable generate-wrapper col-md-'+ui.value;
			if($("#"+editableId).hasClass("layout-box")){				
				newClass += ' layout-box';
			}
			$("#"+editableId).removeClass();			
			$("#"+editableId).addClass(newClass);
		}
	});
	
});


$('#colorSelector').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#colorSelector div').css('backgroundColor', '#' + hex);
		var editableId = $(".editable").attr('id');	
		$('#'+editableId).css('backgroundColor', '#' + hex);
	}
});

$('#colorSelector2').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#colorSelector2 div').css('backgroundColor', '#' + hex);
		var editableId = $(".editable").attr('id');	
		$('#'+editableId).css('color', '#' + hex);
	}
});


//remove-editable
$(document).on("click", "#remove-editable", function(event) {
	var editableId = $(".editable").attr('id');	
	if(editableId != 'pagemaker-body')
	$('#'+editableId).remove();
});

$("#pagemaker-body").droppable( {	
	hoverClass: "bg-warning",			
	drop: handleDropEvent,
}).sortable({  
	handle: '.generate-wrapper',  
	cursor: 'move',  
	forcePlaceholderSize: true,  
	opacity: 0.4,  
}).disableSelection(); 


//generate-wrapper
$(document).on("click", ".generate-wrapper", function(event) {
	var editableId = $(this).attr('id');	
	$('#page-preview-body').find('*').removeClass('editable');
	$("#"+editableId).addClass('editable');	
	event.stopImmediatePropagation();
});

function handleDropEvent( event, ui ) {
	event.stopImmediatePropagation();	
	var draggable = ui.draggable;	  
	var type = draggable.data('type');	
	var dropBoxId = $(".editable").attr('id');		
	if(type){
		if (type == 'layout') {
			var boxno = draggable.data('boxno');	    	
			generateLayout(dropBoxId,boxno);
		}else if (type == 'contact-form') {			
			generateContactForm(dropBoxId,type);
		}else if (type == 'googlemap') {			
			generateGoogleMap(dropBoxId,type);
		}else if (type == 'menu') {			
			var nscode = draggable.data('nscode');
			generateMenu(dropBoxId,type,nscode);
		}else {
			var data_id = draggable.attr('id');			
			generateContent(dropBoxId,data_id,type);			
		}
	}	
	return false;
}

//generate html contact form
function generateMenu(dropBoxId,type,nscode){	
	$(".overlay").show();
	var url = base_url+'/PageMakers/generatenscode';	
	$.ajax({
		type : 'POST',
		url : url,		
		data: {nscode:nscode,type:type},
		success : function(data) {
			if(data){
				var wrapperDiv = generateWrapperDiv(data,type,gridClass='helper-div col-md-12');
				$("#"+dropBoxId).append(wrapperDiv.html);
				$('#'+dropBoxId).append('<div class="nscode hide">'+nscode+'</div>');			
			}
			$(".overlay, #flashMessage, .loadingIcon").hide();
		}
	});
}



//generate html contact form
function generateContactForm(dropBoxId,type){
	var html ='';
	html += '<div id="'+type+'" class="">';
	html += '<form action="'+base_url+'/contactus" enctype="multipart/form-data" method="post">';
	
	//Name Field
	html += '<div class="form-group required">';
	html += '<label for="ContentTitle">Name</label>';
	html += '<input type="text" placeholder="Enter Your Name" required="required" id="ContactName" maxlength="255" class="form-control" name="data[Contact][name]">';
	html += '</div>';

	//Email Field
	html += '<div class="form-group required">';
	html += '<label for="ContentTitle">Your Email</label>';
	html += '<input type="email" placeholder="Enter Your Email" required="required" id="ContactEmail" maxlength="255" class="form-control" name="data[Contact][email]">';
	html += '</div>';

	//Company Name Field
	html += '<div class="form-group required">';
	html += '<label for="ContentTitle">Company Name</label>';
	html += '<input type="text" placeholder="Enter Your Company Name" required="required" id="ContactCompanyName" maxlength="255" class="form-control" name="data[Contact][company_name]">';
	html += '</div>';


	//Subject Field
	html += '<div class="form-group required">';
	html += '<label for="ContentTitle">Subject</label>';
	html += '<input type="text" placeholder="Enter Your Company Name" required="required" id="ContactCompanyName" maxlength="255" class="form-control" name="data[Contact][subject]">';
	html += '</div>';

	//Message Field
	html += '<div class="form-group required">';
	html += '<label for="ContentTitle">Message</label>';
	html += '<textarea placeholder="Enter Your Message..." required="required" id="ContactMessage" class="form-control" name="data[Contact][message]"></textarea>';
	html += '</div>';

	//File Field
	html += '<div class="">';
	html += '<label for="ContentTitle">File</label>';
	html += '<input type="file" id="ContactFile" name="data[Contact][file]">';
	html += '</div>';

	//Message Field
	html += '<div class="form-group required">';	
	html += ' <button type="submit" class="btn btn-success">Submit</button>';
	html += '</div>';

	html += '</form>';
	html += '</div>';

	var wrapperDiv = generateWrapperDiv(html,type,gridClass='contact-wrapper col-md-12');
	$("#"+dropBoxId).append(wrapperDiv.html);			
}

function generateGoogleMap(dropBoxId,type){
	var html ='';
	html += '<div id="'+type+'" class="">';
	html += '<div class="hide">#ns-phpstart echo $site_data["Configuration"]["google_location"];#ns-phpend</div>';
	html += '</div>';	

	var wrapperDiv = generateWrapperDiv(html,type,gridClass='googlemap-wrapper col-md-12');
	$("#"+dropBoxId).append(wrapperDiv.html);
}

function generateContent(dropBoxId,data_id,type){	
	$(".overlay").show();
	var url = base_url+'/PageMakers/generateview';
	$.ajax({
		type : 'POST',
		url : url,		
		data: {data_id:data_id,type:type},
		success : function(data) {
			if(data){					
				var wrapperDiv = generateWrapperDiv(data,type,gridClass='content-wrapper col-md-12');				
				$("#"+dropBoxId).append(wrapperDiv.html);

			}
			$(".overlay, #flashMessage, .loadingIcon").hide();
		}
	});

}

// Generate Layout
function generateLayout( dropBoxId, boxno){	    	
	var elClass = 12/boxno;			
	if(boxno == 1){
		gridClass = 'layout-box row';
	}else{
		gridClass = 'layout-box col-md-'+elClass;
	}
	
	for(var i=1;i <= boxno;i++){
		var boxId = new Date().getTime();		
		var html ='';
		var wrapperDiv = generateWrapperDiv(html,type='layout'+i,gridClass);		
		$("#"+dropBoxId).append(wrapperDiv.html);	
	}	
}

function generateWrapperDiv(innerHtml,type, gridClass){			
	var now = new Date();
	var milliseconds = now.getTime();
	var zindex = '';
	
	var wrapperHtml = '';
	var wrapperId = type+'-'+milliseconds;
	wrapperHtml += '<div id="'+wrapperId+'" class="generate-wrapper thumbnail '+gridClass+'" style="z-index:'+zindex+';">';
	wrapperHtml += innerHtml;
	wrapperHtml += '</div>';
	
	var wrapperDiv = [];
	wrapperDiv['html'] = wrapperHtml;
	wrapperDiv['wrapperId'] = wrapperId;

	return wrapperDiv;
}


//page-preview
$(document).on("click", "button#page-preview", function(event) {
	var page_title = $("#PageMakerTitle").val();
	var page_preview_div = '<div id="page_preview_div" class="panel panel-default">';
	page_preview_div += '<div class="panel-heading clearfix">Page Preview <button id="page_preview_close" type="button" class="btn btn-danger pull-right" aria-hidden="true">&times; Close</button></div>';
	page_preview_div += '<div class="panel-body" style="max-height:1000px;overflow:auto;">';
	page_preview_div += '<div class="page-header"><h1>'+page_title+"</h1></div>";
	page_preview_div += '</div></div>';
	$('body').append(page_preview_div);
	var pagemakerHtml = $("#pagemaker-body").html();
	$("#page_preview_div .panel-body").append(pagemakerHtml);		
	$("#page_preview_div").find('*').removeClass('generate-wrapper thumbnail layout-box generate-wrapper editable layout-box layout-wrapper pagemaker-dropable helper-div dropdisable thumbnail layout-wrapper content-wrapper wrapper-body layout-box  ui-droppable');
	
	return false;
});

//page-save
$(document).on("submit", "#PageMakerAdminAddForm, #PageMakerAdminEditForm", function(event) {
	$(".overlay").show();
	
	var page_preview_div = '<div id="page_save_div"></div>';
	var pagemakerHtml = $("#pagemaker-body");
	$('body').append(page_preview_div);	
	
	$("#pagemaker-body .helper-div").remove();	

	// get all phpcode
	$("#pagemaker-body .phpcode").each(function() {
		var data_id = $(this).data('id');
		var data_method = $(this).data('method');
		var data_helper = $(this).data('helper');		
		var generatePhpCode = "#ns-code#"+data_helper+":"+data_method+":"+data_id+"#ns-code#";		
		$(this).after(generatePhpCode);
		//$(this).remove();
	});


	var pagemakerHtml = $("#pagemaker-body").html();
	$("#page_save_div").append(pagemakerHtml);
	
	

	$("#page_save_div .custome-tools").remove();
	

	$("#page_save_div").find('*').removeClass('generate-wrapper hide pagemaker-dropable helper-div dropdisable thumbnail layout-wrapper content-wrapper wrapper-body layout-box  ui-droppable');
	
	$("#PageMakerBody").val(' ');
	$("#PageMakerBody").val($("#page_save_div").html());

	$("#pagemaker-body").find('*').removeClass('hide');
	//save all developer code for PageMakerDeveloperBody
	$("#PageMakerDeveloperBody").val(' ');
	$("#PageMakerDeveloperBody").val($("#pagemaker-body").html());

	//event.preventDefault(0);
});


//page_preview_close
$(document).on("click", "#page_preview_close", function(event) {	
	$("#page_preview_div").remove();
});
//generate-wrapper-delete 
$(document).on("click", ".generate-wrapper-delete", function(event) {
	var wrapperid = $(this).data('wrapperid');
	$("#"+wrapperid).remove();
});
//generate-wrapper-size
$(document).on("change", ".generate-wrapper-size", function(event) {
	var wrapperid = $(this).data('wrapperid');
	var wrapper_size  = $(this).val();
	$("#"+wrapperid).removeClass().addClass('generate-wrapper thumbnail '+wrapper_size);
});

//get all published content list
$(document).on("click", ".contentLink", function(event) {
	
	if(!($(this).hasClass('data-load-ok'))){
		$(this).addClass('data-load-ok');
		
		var url = base_url+'/PageMakers/getallcontent';
		var model = $(this).data('model');
		
		var id = $(this).attr('href');		
		$(id+" .panel-body").append(loadingIcon());		
		$.ajax({
			type : 'POST',
			url : url,		
			data: {model:model},
			success : function(data) {
				data = jQuery.parseJSON( data );
				
				if(data.success == false){				
					$(id+" .panel-body").html('<p class="text-danger">Data Not Found</p>');
				}else if(data){		
					$.each(data.data, function( index, value ) {
						var html = '<li data-type="'+model+'" class="list-group-item draggable"  draggable="true" id="'+index + '"><i class="fa fa-arrows"></i> '+ value+'</li>';
						$(id+"-ul").append(html);						
					});				
					$(id+"-ul li").draggable({
						containment: '#content',
						cursor:'move',
						revert: true,
						helper: "clone"
					});
				}	
				$(".overlay, #flashMessage, .loadingIcon").hide();
			}
		});
	}
});


function loadingIcon(){
	return html = '<div class="loadingIcon"><i class="fa fa-spinner fa-spin fa-4x"></i><p class="text-warning">Loading...</p></div>';
}

/*
 * AuthorizedMenuDominionId for get Action list for a Controller from AuthorizedMenusController in getProcessListByDominionsId()
 * 
 */
 $(document).on("change", "#AuthorizedMenuDominionId", function(event){
 	var dominion_id = ($(this).val());
 	$(".overlay").show();
 	url = base_url+"/AuthorizedMenus/getProcessListByDominionsId";	
 	$.ajax({
 		type : 'POST',
 		url : url,		
 		data: ({dominion_id:dominion_id}),			
 		success : function(data) {	
 			data = jQuery.parseJSON( data );

 			if(data){
 				var html ='';
 				$.each(data,function(index, value){					
 					html += '<option value="'+index+'" >'+value+'</option>';
 				});				
 				$("#AuthorizedMenuProcessId").html(html);
 				$("#AuthorizedMenuProcessId").closest('.form-group').removeClass('hide');
 			}
 			$(".overlay").hide();			
 		}
 	});		
 });

 $(document).on("click", "#mark-all", function(event) {	
 	var wrap_selector = $(this).data('wrap-selector');	
 	if($(this).is(":checked")){
 		$(wrap_selector).find('.mark-all').prop('checked','checked');	
 	}else{
 		$(wrap_selector).find('.mark-all').removeAttr('checked');
 	}
 });

$(function() {
	$( ".datepicker" ).datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat: 'dd-mm-yy'
	});
});
 
//setPermissionForRole are use for permission set for Role
$(document).on("click", ".setPermissionForRole", function(event) {	
	
	var actionType = 'delete';
	if($(this).is(":checked")){
		actionType = 'save';
	}
	var role_id = $(this).data('role_id');
	var dominion_id = $(this).data('dominion_id');
	var process_id = $(this).data('process_id');
	
	url = base_url+"/admin/Roles/setpermission";	
	$.ajax({
		type : 'POST',
		url : url,		
		data: ({role_id:role_id,dominion_id:dominion_id,process_id:process_id,actionType:actionType}),			
		success : function(data) {	
			
		}
	});	
	
});


/*
 * .ajax_form is using for AJAX Form submit.
 * set .ajax_form calss in form class
 */
 $(document).on("submit", "form.ajax_form", function(event) {
 	url = $(this).attr('action');	
 	if(url){
 		var submit = $(this).find(':submit');
 		submit.val('Saving...');
 		submit.addClass('disabled');

 		var data = $(this).serialize();
 		$.ajax({
 			type : 'POST',
 			url : url,
 			data: data,			
 			success : function(data) {
 				if(data){
 					$("#content .vbox").html(data);
 					$('#modal-close').click();
 				}

 				$(".overlay, #flashMessage").hide();
 			}
 		});
 		event.preventDefault();	
 	}
 });

/*
 * previewImage For Show Image Preview when user select an image.
 * @selector is class or id exm: .image or #image
 */
 function previewImage(selector) {
 	var file = document.querySelector('input[type=file]'+selector).files[0];
 	var reader = new FileReader();

 	reader.onloadend = function() {
 		$(".previewimg").remove();
 		var previewHtml = '<div class="previewimg col-md-12 clearfix"><div><img class="thumbnail col-md-3" src="' + reader.result + '" /></div></div>';
 		$(selector).before(previewHtml);
 	}
 	if (file) {
 		reader.readAsDataURL(file);
 	} else {
 		$(".previewimg").html('');
 	}
 }

/*
 * handleImagePreview For multiple image preview before image upload
 * function call style below 
 * document.getElementById('inputImageTagId').addEventListener('change', handleFileSelect, false); 
 */
 function handleImagePreview(evt) {	
	var files = evt.target.files; // FileList object
	document.getElementById('list').innerHTML = '';
	// Loop through the FileList and render image files as thumbnails.
	for (var i = 0, f; f = files[i]; i++) {
		// Only process image files.
		if (!f.type.match('image.*')) {
			alert("Please Upload only Image");
		} else {
			var reader = new FileReader();
			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					// Render thumbnail.
					var span = document.createElement('div');
					span.innerHTML = ['<div class="col-sm-2 col-md-2"><div  class="thumbnail"  style="height:150px;overflow:hidden;"><img src="', e.target.result, '" title="', escape(theFile.name), '"/><div class="caption"><div style="overflow:hidden;">', escape(theFile.name), '</div><div>Size: ', escape(parseInt(theFile.size / 1000)), ' Kb</div></div>'].join('');
					document.getElementById('list').insertBefore(span, null);
				};
			})(f);
			// Read in the image file as a data URL.
			reader.readAsDataURL(f);
		}
	}
}

function handleFileSelect(evt) {
	evt.stopPropagation();
	evt.preventDefault();

    var files = evt.dataTransfer.files; // FileList object.
    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
    	output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
    		f.size, ' bytes, last modified: ',
    		f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
    		'</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
}

function handleDragOver(evt) {
	evt.stopPropagation();
	evt.preventDefault();
    evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
}


/*
 * .ajax_page class are using for get href page link content by ajax
 *
 */
 $(document).on("click", ".ajax_page", function(event) {	

 	if ($(this).attr('href') == undefined) {
 		url = $(this).find('a').attr('href');
 	} else {
 		url = $(this).attr('href');
 	}

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
 				$("#content .vbox").html(data);
 				changeUrlWithoutRefresh('Title',url);
 			}

			//hide flashMessage
			$(".overlay, #flashMessage").hide();
		}
	});
 	event.preventDefault();
 });

 function changeUrlWithoutRefresh(pageTitle,url){
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


 /*
 * onchange function for menu type
 */

$(document).on("change", "#MenuType", function(event) {
	var type = $('#MenuType').val();
	if(type=='content'){
		$('.menu-url').hide();
		$('.menu-des').show();
	}

	if(type=='external_link'){
		$('.menu-des').hide();
		$('.menu-url').show();
	}
	display-meta-field
});

$(document).on("click", "#display-meta-field", function(event) {
	$('.meta-tag').show();
	$('.meta-des').show();
	$('.display-meta-btn').hide();
	$('.hide-meta-btn').show();
});

$(document).on("click", "#hide-meta-field", function(event) {
	$('.meta-tag').hide();
	$('.meta-des').hide();
	$('.display-meta-btn').show();
	$('.hide-meta-btn').hide();
});