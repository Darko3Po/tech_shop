@extends('layouts.admin')


@section('content')
	<div class="card">	
		<div class="card-header">
			<h4>Products Page</h4>
			<hr>
		</div>
		<dvi class="card-body">
			<table class="table  table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Category</th>
						<th>Name</th>
						<th>Description</th>
						<th>Selling Price</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ optional($item->category)->name }}</td>
						<td>{{ $item->name }}</td>
						<td>{{ $item->description }}</td>
						<td>{{ $item->selling_price }}</td>
						<td>
							<img class="category-image" src="{{ asset('assets/uploads/products/'.$item->image) }}" alt="image here">
						</td>
						<td>
							<a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary
							 btn-sm">Edit</a>
							<a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</dvi>
	</div>
@endsection