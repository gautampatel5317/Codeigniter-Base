/**
 * File : country.js
 * 
 * This file contain the validation of add country form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 */

$(document).ready(function(){

	jQuery(document).on("click", ".deleteCountry", function(){
		var countryId = $(this).data("countryid"),
			hitURL = baseURL + "country/deleteCountry",
			currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this Country ?");
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { countryId : countryId } 
			}).done(function(data){
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Country successfully deleted"); $('#mytable').DataTable().ajax.reload(); }
				else if(data.status = false) { alert("Country deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	var addcountryForm = $("#addcountry");
	
	var validator = addcountryForm.validate({
		
		rules:{
			name :{ required : true },
            code : { required : true},
            phone_code : { required : true},
		},
		messages:{
			name :{ required : "This field is required" },
            code : { required : "This field is required" },
            phone_code : { required : "This field is required" },
		}
	});

	var editcountry = $("#editcountry");
	
	var validator = editcountry.validate({
		
		rules:{
			name :{ required : true },
            code : { required : true},
            phone_code : { required : true},
		},
		messages:{
            name :{ required : "This field is required" },
            code : { required : "This field is required" },
            phone_code : { required : "This field is required" },
		}
	});
});
