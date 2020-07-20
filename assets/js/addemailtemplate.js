/**
 * File : addemailtemplate.js
 * 
 * This file contain the validation of add emailtemplate form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 */

$(document).ready(function(){
	
	var addemailForm = $("#addemailtemplate");
	
	var validator = addemailForm.validate({
		
		rules:{
			title :{ required : true },
            type : { required : true, selected : true},
            placeholder : { required : true, selected : true},
            subject :{ required : true },
            body :{ required : true },
		},
		messages:{
			title :{ required : "This field is required" },
            type : { required : "This field is required", selected : "Please select atleast one option" },
            placeholder : { required : "This field is required", selected : "Please select atleast one option" },
            subject :{ required : "This field is required" },
            body :{ required : "This field is required" },				
		}
	});

	var editemailtemplate = $("#editemailtemplate");
	
	var validator = editemailtemplate.validate({
		
		rules:{
			title :{ required : true },
            type : { required : true, selected : true},
            placeholder : { required : true, selected : true},
            subject :{ required : true },
            body :{ required : true },
		},
		messages:{
			title :{ required : "This field is required" },
            type : { required : "This field is required", selected : "Please select atleast one option" },
            placeholder : { required : "This field is required", selected : "Please select atleast one option" },
            subject :{ required : "This field is required" },
            body :{ required : "This field is required" },				
		}
	});
});
