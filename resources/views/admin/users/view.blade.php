 @extends('layouts.admin')


@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">	
					<div class="card-header">
						<h4>Users Details
							<a href="{{ url('users') }}" class="btn btn-primary float-right" title="">Back</a>
						</h4>
					</div>
					<dvi class="card-body">
						 <div class="row">
						 	<div class="col-md-4 mt-3">
						 		<label for="">Role</label>
						 		<div class="p-2 border">
						 			{{ $users->role_as == '0'? 'Users' : 'Admin'  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">First name</label>
						 		<div class="p-2 border">
						 			{{ $users->name  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">Last name</label>
						 		<div class="p-2 border">
						 			{{ $users->lname  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">Email</label>
						 		<div class="p-2 border">
						 			{{ $users->email  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">Phone</label>
						 		<div class="p-2 border">
						 			{{ $users->phone  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">Address</label>
						 		<div class="p-2 border">
						 			{{ $users->address1  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">Address 2</label>
						 		<div class="p-2 border">
						 			{{ $users->address2  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">City</label>
						 		<div class="p-2 border">
						 			{{ $users->city  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">State</label>
						 		<div class="p-2 border">
						 			{{ $users->state  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">Country</label>
						 		<div class="p-2 border">
						 			{{ $users->country  }}
						 		</div>
						 	</div>
						 	<div class="col-md-4 mt-3">
						 		<label for="">Pin Code</label>
						 		<div class="p-2 border">
						 			{{ $users->pincode  }}
						 		</div>
						 	</div>
						 </div>
					</dvi>
				</div>
			</div>
		</div>
	</div>
	
@endsection