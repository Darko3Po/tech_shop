@extends('layouts.front')

@section('title')
	Checkout
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
	<div class="container">
		<h6 class="mb-0">Home / Checkout</h6>
	</div>
</div>
	
	<div class="container mt-5">
	  <form action="{{ url('place-order') }}" method="POST">
	  	{{ csrf_field() }}
		<div class="row">
			<div class="col-md-7">
				<div class="card">
					<div class="card-body">
						<h6>Basic Details</h6>
						<hr>
						<div class="row checkout-form">
							<div class="col-md-6">
								<label for="firstName">First Name</label>
								<input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name" required>
								<span id="fname_error" class="text-danger"></span>
							</div>
							<div class="col-md-6">
								<label for="lastName">Last Name</label>
								<input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name" required>
								<span id="lname_error" class="text-danger"></span>
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Email</label>
								<input type="text" class="form-control email"value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email" required>
								<span id="email_error" class="text-danger"></span>
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Phone Number</label>
								<input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number" required>
								<span id="phone_error" class="text-danger"></span>
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Address 1</label>
								<input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter First Name" required>
								<span id="address1_error" class="text-danger"></span>
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Address 2</label>
								<input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter First Name" required>
								<span id="address2_error" class="text-danger"></span>
							</div>
							<div class="col-md-6 mt-3">
								<label for="">City</label>
								<input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter First Name" required>
								<span id="city_error" class="text-danger"></span>
							</div>
							<div class="col-md-6 mt-3">
								<label for="">State</label>
								<input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State" required>
								<span id="state_error" class="text-danger"></span>
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Country</label>
								<input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country" required>
								<span id="country_error" class="text-danger"></span>
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Pin Code</label>
								<input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code" required>
								<span id="pincode_error" class="text-danger"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<h6>Order Details</h6>
						<hr>
						@php $total = 0; @endphp
						@if ($cartitems->count() > 0)
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Qty</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($cartitems as $item)
									<tr>
										<td>{{ $item->products->name }}</td>
										<td>{{ $item->prod_qty }}</td>
										<td>{{ $item->products->selling_price }}</td>
									</tr>
									<div class="total_price">
									<h4>Total price:</h4>
										@php
										$total += $item->products->selling_price * $item->prod_qty;
										@endphp
								</div>
									@endforeach
								</tbody>	
							</table>
							<hr>
							<div class="card-footer">
								<h6> Total Price: <span class="float-end">$ {{ $total }}</span> </h6>
								<a href="{{ url('checkout') }}"></a>
							</div>
						<input type="hidden" name="payment_mode" value="COD ">
						<button type="submit" class="btn btn-success w-100 float-end" style="margin: 30px 0 20px 0;">Place Order</button>

						{{-- <button style="margin-bottom: 20px;" type="button" class="btn btn-primary w-100 mt-2 float-end apppay_btn">Place with AppPay</button> --}}

						{{-- Paypal button --}}
						 <div id="paypal-button"></div>
						 @else
						 	<h4>Your Checkout page is empty</h4>
						 @endif
						
					</div>
				</div>
			</div>
		</div>
	  </form>
	</div>
@endsection

@section('scripts') 
	<script src="https://www.paypal.com/sdk/js?AfxUOEwxWqjeSJDn8XiRmqejq5q3tZoEwOEL4oZx9lKTaRGM2NgoXHi9pOyp2wr3rjqL0xr8up_LG_NL"></script>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>



	{{-- <script>
		paypal.Buttons({
			createOrder: function(data, actions){
				return actions.order.create({
					purchase_units: [{
						amount:{
							value : '{{ $total }}'
						}
					}]
				})
			},
			onApprove: function(data, actions){
				return actions.order.capture().then(function(details){
					// alert('Transaction complited by ' + details.payer.name.given_name);

					var firstname = $('.firstname').val();
					var lastname = $('.lastname').val();
					var email = $('.email').val();
					var phone = $('.phone').val();
					var address1 = $('.address1').val();
					var address2 = $('.address2').val();
					var city = $('.city').val();
					var state = $('.state').val();
					var country = $('.country').val();
					var pincode = $('.pincode').val();

					$.ajax({
				    		method: 'POST',
				    		url: '/place-order',
				    		data: {
				    			'fname':firstname,
				    			'lname':firstname,
				    			'email':firstname,
				    			'phone':firstname,
				    			'address1':firstname,
				    			'address2':firstname,
				    			'city':firstname,
				    			'state':firstname,
				    			'country':firstname,
				    			'pincode':firstname,
				    			'payment_mode':'Pay with PayPal',
				    			'payment_id':details.id,
				    		},
				    		success: function (responseb) {
				    			alert(responseb.status);  
				    			window.location.href = '/my-orders';
				    		}
				    	}); 
				});
			}
		}).render('#paypal-button-container');
	</script> --}}

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'rect',
      tagline: 'false',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '{{ $total }}',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>

@endsection


