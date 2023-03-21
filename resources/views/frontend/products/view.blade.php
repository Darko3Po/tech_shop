@extends('layouts.front')

@section('title', $products->name)


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
	<div class="container">
		<h6 class="mb-0">Collections / {{ $products->category->name }} / {{ $products->name }}</h6>
	</div>
</div>

<div class="container">
	<div class="card shadow product_data">
		<div class="card-body">
			<div class="row">
				<div class="col-md-4 border-right" >
				  <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100">
				</div>

				<div class="col-md-8" style="display: inline">
				<h2 class="mb-0">
					{{ $products->name }}
					@if ($products->trending == '1')
						<label style="font-size: 16px;" class="float-end badge bg-danger trending-tag">Trending</label>
					@endif	
				</h2>

				<hr>
				<label class="me-3">Original price: <s>{{ $products->original_price }}</s></label>
				<label class="me-3">Selling price: {{ $products->selling_price }}</label>
				<p class="mt-3">
					{!! $products->small_description !!}
				</p>
				<hr>
				@if ($products->qty > 0)
					<label class="badge bg-success">In Stocks</label>
				@else
					<label class="badge bg-danger">Out of Stocks</label>
				@endif
				<div class="row mt-2">
					<div class="col-md-2">
						<input type="hidden" value="{{ $products->id }}" class="prod_id">
						<label for="Quantity">Quantity</label>
						<div class="input-group text-center mb-3">
							<button class="input-group-text decrement-btn">-</button>
							<input type="text" name="quantity"  class="qty-input form-control text-center" value="1">
							<button class="input-group-text increment-btn">+</button>
						</div>
					</div>
					<div class="col-md-10">
						<br>
						<button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i> </button>
						<button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i> </button>
					</div>
				</div>
			  </div>
			</div>

			<div class="col-md-12">
			<hr>
			<h3>Description</h3>
			<p class="mt-3">
				{!! $products->description !!}
			</p>
			</div>
		</div>
	</div>
</div>



@endsection


@section('scripts')
	<script>
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

		        var inc_value = $('.qty-input').val();
		        var value = parseInt(inc_value, 10);
		        value = isNaN(value) ? 0 : value;
		        if(value < 10)
		        {
		            value++;
		            $('.qty-input').val(value);
		        }
		    });

		    $('.decrement-btn').click(function(e){
		        e.preventDefault();

		        var dec_value = $('.qty-input').val();
		        var value = parseInt(dec_value, 10);
		        value = isNaN(value) ? 0 : value;
		        if(value > 1)
		        {
		            value--;
		            $('.qty-input').val(value);
		        }
		    });
		});
	</script>
@endsection







