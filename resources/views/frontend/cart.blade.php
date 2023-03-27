@extends('layouts.front')

@section('title')
	My Cart
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
	<div class="container">
		
		<h6 class="mb-0">
			<a style="color: #333" href="{{ url('/') }}">Home </a>/
			<a style="color: #333" href="{{ url('cart') }}">Cart</a>
		</h6>
	</div>
</div>

<div class="container my-5">
	<div class="card shadow product_data">
		<div class="card-body">
			@foreach ($cartitems as $item)
					<div class="row">
					<div class="col-md-2">
						<img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" style="width: 100px;" alt="">
					</div>
					<div class="col-md-5">
						<h3>{{ $item->products->name }}</h3>
					</div>
					<div class="col-md-3">
						<input type="hidden" name="prod_id">
						<label for="Quantity">Quantity</label>
						<div class="input-group text-center mb-3" style="width:130px">
							<button class="input-group-text decrement-btn">-</button>
							<input type="text" name="quantity" class="form-control qty-input text-center" value="1">
							<button class="input-group-text decrement-btn">+</button>
						</div>
					</div>
					<div class="col-md-2">
						<h3>Remove</h3>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection


