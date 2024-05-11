/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	//var base_url = "http://localhost/artdoc";
	var base_url = $('head').data('baseurl');
	
	//var base_url = "http://www.baustqadirabad.org";
    config.filebrowserBrowseUrl = base_url+'/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = base_url+'/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = base_url+'/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = base_url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = base_url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = base_url+'/ckfinder/core/connector';
	config.allowedContent=true;
	
	// Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
config.toolbar = [
	//{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source'] },
	//{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	//{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
	//{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
	//'/',
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline',  'Subscript', 'Superscript' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', ] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image',  'Table', 'HorizontalRule' ] },
	//'/',
	{ name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	{ name: 'tools', items: [ 'Maximize' ] },
	//{ name: 'others', items: [ '-' ] },
	{ name: 'about', items: [ 'About' ] }
];
	
	//config.removePlugins = 'flash,iframe,smiley,pagebreak,';


	
};

CKEDITOR.config.allowedContent = true;