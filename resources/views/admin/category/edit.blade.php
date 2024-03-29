@extends('layouts.admin')


@section('content')
	<div class="card">	
		<div class="card-header">
			<h4>Edit/Update Category</h4>
		</div>
		<dvi class="card-body">
			<form action="{{ url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-6">
						<label for="">Name</label>
						<input type="text" value="{{ $category->name }}" name="name" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="">Slug</label>
						<input type="text" value="{{ $category->slug }}" name="slug" class="form-control">
					</div>
					<div class="col-md-12">
						<label for="">Description</label>
						<textarea name="description"rows="3"  class="form-control" >{{ $category->description }}"</textarea>	
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Status</label>
						<input type="checkbox" {{ $category->status == "1" ? 'checked' : '' }} name="status" class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Popular</label>
						<input type="checkbox" {{ $category->popular == "1" ? 'checked' : '' }} name="popular" class="form-control">
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Title</label>
						<input type="text" value="{{ $category->meta_title }}" name="meta_title" class="form-control">
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Descripton</label>
						<textarea name="meta_descrip"rows="3" class="form-control" >{{ $category->meta_descrip }}</textarea>	
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Keywords</label>
						<textarea name="meta_keywords"rows="3" class="form-control" >{{ $category->meta_keywords }}</textarea>	
					</div>
					@if($category->image)
						<img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Category Image">
					@endif
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