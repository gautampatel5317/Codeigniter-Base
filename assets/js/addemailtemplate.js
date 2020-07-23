/**
 * File : addemailtemplate.js
 * 
 * This file contain the validation of add emailtemplate form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 */

$(document).ready(function(){

	jQuery(document).on("click", ".deleteEmailtemplate", function(){
		var emailId = $(this).data("emailid"),
			hitURL = baseURL + "deleteEmailtemplate",
			currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this user ?");
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { emailId : emailId } 
			}).done(function(data){
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Email Template successfully deleted"); window.location.reload();}
				else if(data.status = false) { alert("Email Template deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	
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
