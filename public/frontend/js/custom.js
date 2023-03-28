	//Increment and decrement for qunatity

		$(document).ready(function(){

			//Add item to Cart

			$('.addToCartBtn').click(function(e) {
				e.preventDefault();

				var product_id = $(this).closest('.product_data').find('.prod_id').val();
				var product_qty = $(this).closest('.product_data').find('.qty-input').val();

				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
						url: '/add-to-cart',
						method: 'post',
						data: {
							'product_id' : product_id,
							'product_qty' : product_qty,
						},
						success: function (response) {
							swal(response.status);
						}
					});

			});

			//Code for number qunatity  - number +

		    $('.increment-btn').click(function(e){
		        e.preventDefault();

		        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
		        var value = parseInt(inc_value, 10);
		        value = isNaN(value) ? 0 : value;
		        if(value < 10)
		        {
		            value++;
		            $(this).closest('.product_data').find('.qty-input').val(value);

		        }
		    });

		    $('.decrement-btn').click(function(e){
		        e.preventDefault();

		        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
		        var value = parseInt(dec_value, 10);
		        value = isNaN(value) ? 0 : value;
		        if(value > 1)
		        {
		            value--;
		            $('.qty-input').val(value);
		            $(this).closest('.product_data').find('.qty-input').val();
		        }
		    });

		    //Delete logic in jQuery
		    $('.delete-cart-item').click(function (e) {
		    	e.preventDefault();

		    	//Ajax token 
		    	$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
		    	
		    	var prod_id = $(this).closest('.product_data').find('.prod_id').val();
		    	$.ajax({
		    		method: "POST",
		    		url: "delete-cart-item",
		    		data: {
		    			'prod_id':prod_id,
		    		},
		    		success: function(response){
		    			window.location.reload();
		    			swal("", response.status, "success");
		    		}
		    	});
		    	


		    });


		});