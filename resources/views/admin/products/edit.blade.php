@extends('layouts.admin')


@section('content')
	<div class="card">	
		<div class="card-header">
			<h4>Add Product</h4>
		</div>
		<dvi class="card-body">
			<form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-12 mb-3">
						 <label for="">Category</label>
						 <select class="form-control">
						 	<option value="">{{ $products->category->name }}</option>
						 </select>
					</div>
					<div class="col-md-6">
						<label for="">Name</label>
						<input type="text" name="name" value="{{ $products->name }}" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="">Slug</label>
						<input type="text" name="slug" value="{{ $products->slug }}" class="form-control">
					</div>
					<div class="col-md-12">
						<label for="">Small Description</label>
						<textarea name="small_description"rows="3" class="form-control" >{{ $products->small_description }}</textarea>	
					</div>
					<div class="col-md-12">
						<label for="">Description</label>
						<textarea name="description"rows="3" class="form-control" >{{ $products->description }}</textarea>	
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Original Price</label>
						<input type="number" name="original_price" value="{{ $products->original_price }}" class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Selling Price</label>
						<input type="number" name="selling_price" value="{{ $products->selling_price }}"  class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Quantity</label>
						<input type="number" name="qty" value="{{ $products->qty }}"  class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Tax</label>
						<input type="number" name="tax" value="{{ $products->tax }}"  class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Status</label>
						<input type="checkbox" {{ $products->status == "1" ? 'checked' : '' }} name="status" class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Trending</label>
						<input type="checkbox" {{ $products->trending == "1" ? 'checked' : '' }}name="trending" class="form-control">
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Title</label>
						<input type="text" name="meta_title" value="{{ $products->meta_title }}" class="form-control">
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Descripton</label>
						<textarea name="meta_descrip"rows="3" class="form-control" >{{ $products->meta_descrip }}</textarea>	
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Keywords</label>
						<textarea name="meta_keywords"rows="3" class="form-control" >{{ $products->meta_keywords }}</textarea>	
					</div>
					@if ($products->image)
						<img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="">
					@endif
					<div class="col-md-12 mb-3">
						<input type="file" name="image" class="form-control">
					</div>
					<div class="col-md-12 mb-3">
						<button type="submit"  class="btn btn-primary">Update</button>
					</div>
				</div>
			</form>
		</dvi>
	</div>
@endsection