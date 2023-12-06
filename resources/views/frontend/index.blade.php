@extends('layouts.front')

@section('title')
	Welcome to Tech shop
@endsection

@section('content')
	@include('layouts.inc.slider')

		<div class="py-5">
		<div class="container">
			<div class="row">
				<h2>Trend Category</h2>
				<div class=" featured-carousel owl-carousel owl-theme">
					@foreach ($trending_category as $tcategory)
						<div class="item">
						  <a href="{{ url('category/'.$tcategory->slug) }}">
							<div class="card">
								<img src="{{ asset('assets/uploads/category/'.$tcategory->image) }}" alt="category image">
								<div class="card-body">
									<h5>{{ $tcategory->name }}</h5>
									<p>
										{{ $tcategory->description }}
									</p>
								</div>
							</div>
                          </a>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
<script>
		$('.featured-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:5
	        }
	    }
	})
</script>
@endsection

