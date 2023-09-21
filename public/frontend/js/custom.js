	//Increment and decrement for qunatity

		$(document).ready(function(){

			loadcart();
			loadwishlist(); 

			//Ajax token 
		    	$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

			function loadcart()
		    {
				$.ajax({
					method:'GET',
					url: '/load-cart-data',
					success: function(response){
						$('.cart-count').html('');
						$('.cart-count').html (response.count);
					}
				});
				
			}

			function loadwishlist()
		    {
				$.ajax({
					method:'GET',
					url: '/load-wishlist-count',
					success: function(response){
						$('.wishlist-count').html('');
						$('.wishlist-count').html (response.count);
					}
				});
				
			}

			//Add item to Cart

			$('.addToCartBtn').click(function(e) {
				e.preventDefault();

				var product_id = $(this).closest('.product_data').find('.prod_id').val();
				var product_qty = $(this).closest('.product_data').find('.qty-input').val();


				$.ajax({
						url: '/add-to-cart',
						method: 'post',
						data: {
							'product_id' : product_id,
							'product_qty' : product_qty,
						},
						success: function (response) {
							swal(response.status);
							loadcart();
						}
					});
 
			});

			// Add item to Wishlist
 
			$('.addToWishlist ').click(function (e) {
				e.preventDefault();

				var product_id = $(this).closest('.product_data').find('.prod_id').val();
				
				
				$.ajax({
						method: 'POST',
						url: '/add-to-wishlist',
						data: {
							'product_id' : product_id,
						},
						success: function (response) {
							swal(response.status); 
							loadwishlist();
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
		          //  $('.qty-input').val(value);
		            $(this).closest('.product_data').find('.qty-input').val(value);
		        }
		    });

			//Deltete item to Wislist

			$('.remove-wislist-item').click(function(e) {
				e.preventDefault();

				   	var prod_id = $(this).closest('.product_data').find('.prod_id').val();


				$.ajax({
						url: '/delete-wislist-item',
						method: 'POST',
						data: {
							'prod_id':prod_id,
						},
						success: function (response) {
							window.location.reload();
							swal(response.status);
						}
					});
 
			});
		    
				
		    //Delete logic in jQuery
		    $('.delete-cart-item').click(function (e) {
		    	e.preventDefault();

		    	
		    	
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

		    $('.changeQuantity').click(function (e) {
		    	e.preventDefault();

		    	//Ajax token 
		    	$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

		    	var prod_id = $(this).closest('.product_data').find('.prod_id').val();
		    	var qty = $(this).closest('.product_data').find('.qty-input').val();
		    	data = {
		    		'prod_id' : prod_id,
		    		'prod_qty' : qty,
		    	}
		    	$.ajax({
		    		method: "POST",
		    		url: 'update-cart',
		    		data: data,
		    		success: function (response) {
		    			window.location.reload();
		    		}
		    	});
		    	

		    });

		});