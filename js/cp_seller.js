$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});


		function readURL(input) {     						/*use for profile image seller*/
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		});



		function readURL2(input) {							/*use for document of seller*/
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (f) {
		            $('#img-upload2').attr('src', f.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp2").change(function(){
		    readURL2(this);
		});




		function readURL3(input) {							/*use for banner upload store*/
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (b) {
		            $('#store_banner_upload').attr('src', b.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#store_banner_image_select").change(function(){
		    readURL3(this);
		});




		function readURL4(input) {							/*use for product image upload store*/
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (p) {
		            $('#product_image').attr('src', p.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#product_select").change(function(){
		    readURL4(this);
		});


		





	});