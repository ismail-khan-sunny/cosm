
CKEDITOR.dialog.add("about", function(a) {
	var a = a.lang.about, b = CKEDITOR.plugins.get("about").path + "dialogs/" + (CKEDITOR.env.hidpi ? "hidpi/" : "") + "logo_ckeditor.png";
	return {
		title : CKEDITOR.env.ie ? a.dlgTitle : 'NogorSolutions',
		minWidth : 390,
		minHeight : 230,
		contents : [{
			id : "tab1",
			label : "",
			title : "",
			expand : !0,
			padding : 0,
			elements : [{
				type : "html",
				html : 'Please contact with NogorSolutions.com for further help.'
			}]
		}],
		buttons : [CKEDITOR.dialog.cancelButton]
	}
}); 