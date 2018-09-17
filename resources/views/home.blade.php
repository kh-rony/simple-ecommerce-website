@extends('layouts.app')

@section('title')
	Home
@endsection

@section('content')

	<!-- Carousel -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="first-slide"
					 src="{{url('/')}}/public/images/banner_1.jpg"
					 alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="second-slide"
					 src="{{url('/')}}/public/images/banner_2.jpg"
					 alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="third-slide"
					 src="{{url('/')}}/public/images/banner_3.jpg"
					 alt="Third slide">
			</div>
		</div>

		<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- /.carousel -->



	<div class="container">

		{{--<form class="form-inline my-2 my-lg-0 justify-content-center">--}}
			{{--@csrf--}}
			{{--<input class="form-control mr-sm-2 col-8" type="search" placeholder="Search Places" aria-label="Search">--}}
			{{--<button class="btn btn-outline-success my-2 my-sm-0 col-1" type="submit">Search</button>--}}
		{{--</form>--}}

		<h2 class="my-4">All Products</h2>

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

	</div>

@endsection