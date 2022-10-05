$(document).ready(function()
{

    $('#save_school').click(function(){
    	    var id = $('#id').val();
            var school_name = $('#school_name').val();
            var school_address = $('#school_address').val();


            if (id != "") {
	            var update = {
	            	id : id,
 	                school_name : school_name,
	                school_address : school_address,
	            };
	            $.ajax({
	            type: "POST",
	            url: "/update",
	            data: update,
	            success: function (data) {
	            	if (data == "Sucess" ) {
	            		alert('Successfully Update!');
	            		$('.input').val("");
	            		$("#list_data").removeAttr('hidden');
	            	} else {
						alert('Please fill all the fields');window.location='/';
	            	}
	             }
	            });
            } else {
	            var data = {
	                school_name : school_name,
	                school_address : school_address,
	            };
            	$.ajax({
	            type: "POST",
	            url: "/add_school",
	            data: data,
	            success: function (data) {

	            	if (data == "Sucess" ) {
	            		alert('Successfully Save!');
	            		$("#list_data").removeAttr('hidden');
	            	} else {
						alert('Please fill all the fields');window.location='/';
	            	}
	             }
           	  });
            }
    });  

    $('.delete').click(function(e){
  
        var ID = $(this).attr('data-id');
        var data = {
            id : ID
        };

        $.ajax({
	        type: "POST",
	        url: "edit",
	        data: data,
	        success: function (data) {
	        	if (data == "Sucess" ) {
	        		alert('Successfully delete!');window.location='/';
	        	} else {
					alert('Somethind wrong..');window.location='/';
	        	}            	
	        }
        });
    });

    $('.edit').click(function(e) {
		var ID = $(this).attr('data-id');
        var data = {
            id : ID,
        };

        $.ajax({
	        type: "POST",
	        url: "edit",
	        data: data,
	        success: function (data) {     
	       		$('#save_school').html("Update");
	       		$('#school_name').val(data.school_name);
	       	    $('#school_address').val(data.school_address);
	       	    $('#id').val(data.id);
	       	    $("#list_data").attr("hidden",true);
	        }
        });
    });

});