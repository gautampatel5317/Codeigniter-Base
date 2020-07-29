/**
 * File : state.js
 * 
 * This file contain the validation of add emailtemplate form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 */

$(document).ready(function(){

	jQuery(document).on("click", ".deleteState", function(){
		var stateId = $(this).data("stateid"),
			hitURL = baseURL + "state/deleteState",
			currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this State ?");
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { stateId : stateId } 
			}).done(function(data){
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("State successfully deleted"); $('#mytable').DataTable().ajax.reload();}
				else if(data.status = false) { alert("State deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	var addstateForm = $("#addstate");
	
	var validator = addstateForm.validate({
		
		rules:{
			name :{ required : true },
            country_id : { required : true, selected : true},
		},
		messages:{
			name :{ required : "This field is required" },
            country_id : { required : "This field is required", selected : "Please select atleast one option" },
		}
	});

	var editstate = $("#editstate");
	
	var validator = editstate.validate({
		
		rules:{
			name :{ required : true },
            country_id : { required : true, selected : true},
		},
		messages:{
			name :{ required : "This field is required" },
            country_id : { required : "This field is required", selected : "Please select atleast one option" },			
		}
	});
});
