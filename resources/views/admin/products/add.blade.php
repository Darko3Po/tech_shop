@extends('layouts.admin')


@section('content')
	<div class="card">	
		<div class="card-header">
			<h4>Add Product</h4>
		</div>
		<dvi class="card-body">
			<form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-12 mb-3">
						<select class="form-select" name="cate_id">
						  <option value="">Select Category</option>
						  @foreach ($category as $item)
						  	 <option value="{{ $item->id }}">{{ $item->name }}</option>
						  @endforeach
						</select>
					</div>
					<div class="col-md-6">
						<label for="">Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="">Slug</label>
						<input type="text" name="slug" class="form-control">
					</div>
					<div class="col-md-12">
						<label for="">Small Description</label>
						<textarea name="small_description"rows="3" class="form-control" ></textarea>	
					</div>
					<div class="col-md-12">
						<label for="">Description</label>
						<textarea name="description"rows="3" class="form-control" ></textarea>	
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Original Price</label>
						<input type="number" name="original_price" class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Selling Price</label>
						<input type="number" name="selling_price" class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Quantity</label>
						<input type="number" name="qty" class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Tax</label>
						<input type="number" name="tax" class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Status</label>
						<input type="checkbox" name="status" class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Trending</label>
						<input type="checkbox" name="trending" class="form-control">
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Title</label>
						<input type="text" name="meta_title" class="form-control">
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Descripton</label>
						<textarea name="meta_descrip"rows="3" class="form-control" ></textarea>	
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Keywords</label>
						<textarea name="meta_keywords"rows="3" class="form-control" ></textarea>	
					</div>
					<div class="col-md-12 mb-3">
						<input type="file" name="image" class="form-control">
					</div>
					<div class="col-md-12 mb-3">
						<button type="submit"  class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</dvi>
	</div>
@endsection