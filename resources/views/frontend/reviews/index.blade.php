 @extends('layouts.front')

@section('title', 'Write a review')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					@if ($verified_purchase->count()>0)
						<h5>You are writing a review for the {{ $product->name }} </h5>
						<form action="" method="POST" accept-charset="utf-8">
							<input type="hidden" name="prod_id" value="{{ $product->id }}">
						</form>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>


@endsection