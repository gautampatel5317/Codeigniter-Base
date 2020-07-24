/**
 * File : city.js
 * 
 * This file contain the validation of add emailtemplate form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 */

$(document).ready(function(){
	
	$(document).on('change', '#country_id', function(e) {
		var country_id = $(this).val();
		getStates(country_id);
	});

	if ($('#country_id').val() != "") {
		getStates($('#country_id').val(),$(".state_select").text());
	}

	function getStates(country_id, state_id) {
		if (country_id != "") {
			$.ajax({
				url: baseURL + "city/getState",
				type: "POST",
				dataType: "json",
				cache: false,
				data: {
					'country_id': country_id,
					'state_id': state_id,
				},
				success: function(dataResult) {
					if (dataResult.success) {
						$("#state_id").html(dataResult.html);
					}
				}
			});
		}
	}

	jQuery(document).on("click", ".deleteCity", function(){
		var cityId = $(this).data("cityid"),
			hitURL = baseURL + "city/deleteCity",
			currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this City ?");
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { cityId : cityId } 
			}).done(function(data){
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("City successfully deleted"); window.location.reload();}
				else if(data.status = false) { alert("City deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	var addcityForm = $("#addcity");
	
	var validator = addcityForm.validate({
		
		rules:{
			name :{ required : true },
            country_id : { required : true, selected : true},
            state_id : { required : true, selected : true}
		},
		messages:{
			name :{ required : "This field is required" },
            country_id : { required : "This field is required", selected : "Please select atleast one option" },
            state_id : { required : "This field is required", selected : "Please select atleast one option" },
		}
	});

	var editcity = $("#editcity");
	
	var validator = editcity.validate({
		
		rules:{
			name :{ required : true },
            country_id : { required : true, selected : true},
            state_id : { required : true, selected : true}
		},
		messages:{
			name :{ required : "This field is required" },
            country_id : { required : "This field is required", selected : "Please select atleast one option" },
            state_id : { required : "This field is required", selected : "Please select atleast one option" },			
		}
	});
});
