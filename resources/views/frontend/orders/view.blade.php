 @extends('layouts.front')

@section('title')
	My Orders
@endsection
 
@section('content')
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Order View</h4>
						<a href="{{ url('my-orders') }}" title="" class="btn btn-warning text-white float-end">Back</a>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<h5>Shipping Details</h5>
								<hr>
								<label>First Name</label>
								<div class="border p-2">{{ $orders->fname }}</div>
								<label>Last Name</label>
								<div class="border p-2">{{ $orders->lname }}</div>
								<label>Email</label>
								<div class="border p-2">{{ $orders->email }}</div>
								<label>Contact No.</label>
								<div class="border p-2">{{ $orders->phone }}</div>
								<label>Shipping Address</label>
								<div class="border p-2">
									{{ $orders->address1 }}, <br>
									{{ $orders->address2 }}, <br>
									{{ $orders->city }}, <br>
									{{ $orders->state }}, <br>
									{{ $orders->country }}, <br>
									{{ $orders->country }},
								</div>
								<label>Zip Code</label>
								<div class="border p-2">{{ $orders->pincode }}</div>
							</div>
							<div class="col-md-6">
								<h5>Order Details</h5>
								<hr>
								<table class="table table-bordered">
							<thead>
								<th>Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Image</th>
							</thead>
							<tbody>
								@foreach ($orders->orderitems as $item)
									<tr>
										<td>{{ $item->products->name }}</td>
										<td>{{ $item-> qty}}</td>
										<td>{{ $item->price }}</td>
										<td>
											<img src="{{ asset('assets/uploads/products/'.$item->products->image ) }}" width="50px" alt="Product Image">
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
							<h4 class="px-2">Total price: <span class="float-end"> {{ $orders->total_price }}</span></h4>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection