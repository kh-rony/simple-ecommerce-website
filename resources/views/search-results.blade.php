@extends('layouts.app')

@section('title')
	Search Result
@endsection

@section('content')

	<div class="container">

		<h2 class="my-4">Search Results</h2>

		@if( isset($data['products']) && count($data['products'] ) )

			@foreach ($data['products']->chunk(4) as $chunk)
				<div class="row">
					@foreach($chunk as $product)
						<div class="col-lg-3 col-sm-6 portfolio-item">
							<div class="card h-100">
								<a href="{{url('/')}}/product-details/{{$product->id}}">
									<img class="img-thumbnail w-100" src="{{url('/')}}/public/images/products/{{$product->photo}}" alt="">
								</a>
								<div class="card-body">
									<h4 class="card-title text-primary">{{$product->name}}</h4>
									<span class="card-text font-weight-bold">{{$product->price}} {{$product->price_currency}}</span>
									<span class="card-text text-muted">({{$product->weight}} {{$product->weight_unit}})</span>
									<p class="card-text">{{$product->short_description}}</p>
								</div>
								<div class="card-footer">
									<a href="{{url('/')}}/product-details/{{$product->id}}" class="btn btn-outline-primary col-md-6 float-lg-right">Details</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<br>
				<br>
			@endforeach

		@else
			<div class="row">
				<div> No product found!</div>
			</div>
		@endif

	</div>

@endsection