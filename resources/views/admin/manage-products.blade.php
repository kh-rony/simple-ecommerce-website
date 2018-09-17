@extends('layouts.app')

@section('title')
	Manage Products
@endsection

@section('content')

	<div class="container">

		<br>
		<br>

		<div class="row">
			<button type="button" class="btn btn-success mr-sm-2" onclick="location.href='{{url('/')}}/create-new-product'">+ Create New Product</button>
		</div>

		<h2 class="my-4">Manage Products</h2>

		<table class="table table-hover table-bordered">
			<thead>
			<tr>
				<th>Product Name</th>
				<th>Stock</th>
				<th>Price</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>

			<tbody>
			@foreach( $data['products'] as $product )
				<tr>
					<td class="col-md-1">{{ $product->name }}</td>
					<td>
						<form method="post" action="{{ url('/') }}/update-stock" class="form-inline">
							@csrf
							<input type="number" class="form-control col-md-4 mr-sm-2" name="stock" value="{{ $product->stock }}" min="0"/>
							<input type="submit" class="btn btn-primary btn-sm my-sm-0" value="Update Stock">

							<input type="hidden" name="id" value="{{$product->id}}">
						</form>
					</td>
					<td>
						<form method="post" action="{{ url('/') }}/update-price" class="form-inline">
							@csrf
							<input type="number" class="form-control col-md-4 mr-sm-2" name="price" value="{{ $product->price }}" min="0"/>
							<input type="submit" class="btn btn-primary btn-sm my-sm-0" value="Update Price">

							<input type="hidden" name="id" value="{{$product->id}}">
						</form>
					</td>
					<td>
						<form method="post" action="{{ url('/') }}/edit-product-info">
							@csrf
							<input type="submit" class="btn btn-secondary btn-sm" value="Edit Product Info">

							<input type="hidden" name="id" value="{{$product->id}}">
						</form>
					</td>
					<td>
						<form method="post" action="{{ url('/') }}/delete-product" onsubmit="return confirmDeleteProduct()">
							@csrf
							<input type="submit" class="btn btn-outline-danger btn-sm" value="Delete Product">

							<input type="hidden" name="id" value="{{$product->id}}">
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>

		</table>

	</div>

@endsection



<script>
	function confirmDeleteProduct()
	{
		return confirm("Are you sure you want to delete this product ?");
	}
</script>