@extends('layouts.app')

@section('title')
	Edit Product
@endsection

@section('content')

	<div class="container">

		<br>

		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Edit Product Form</div>
						<div class="card-body">
							<form method="post" action="{{url('/')}}/update-product-info">
								@csrf

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Product Name</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="name" value="{{$data['product']->name}}" required autofocus>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Category</label>
									<div class="col-md-6">
										<select class="form-control" name="category_id" required>
											@foreach( $data['categories'] as $category )

												@if( $category->id == $data['product']->category_id )
													<option value="{{$category->id}}" selected>{{$category->name}}</option>
												@else
													<option value="{{$category->id}}">{{$category->name}}</option>
												@endif

											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Stock</label>
									<div class="col-md-6">
										<input type="number" class="form-control" name="stock" value="{{$data['product']->stock}}" min="0" required>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Price</label>
									<div class="col-md-6">
										<input type="number" class="form-control" name="price" value="{{$data['product']->price}}" min="0" required>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Price Currency</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="price_currency" value="{{$data['product']->price_currency}}" required>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Weight</label>
									<div class="col-md-6">
										<input type="number" class="form-control" name="weight" value="{{$data['product']->weight}}" min="0" required>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Weight Unit</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="weight_unit" value="{{$data['product']->weight_unit}}" required>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">SKU</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="sku" value="{{$data['product']->sku}}">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Photo</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="photo" value="{{$data['product']->photo}}" required>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Short Description</label>
									<div class="col-md-6">
										<textarea class="form-control" rows="3" name="short_description">{{$data['product']->short_description}}</textarea>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-md-right">Long Description</label>
									<div class="col-md-6">
										<textarea class="form-control" rows="10" name="long_description">{{$data['product']->long_description}}</textarea>
									</div>
								</div>

								<br>

								<input type="hidden" name="id" value="{{$data['product']->id}}">

								<div class="form-group row mb-0">
									<div class="col-md-8 offset-md-4">
										<button type="submit" class="btn btn-primary col-md-6">Submit</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

@endsection