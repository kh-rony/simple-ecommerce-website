@extends('layouts.app')

@section('title')
	Product Details
@endsection

@section('content')

	<div class="container">

		<br>

		<div class="row">

			<div class="col-lg-4 portfolio-item">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="{{url('/')}}/public/images/products/{{$data['product']->photo}}" alt=""></a>
				</div>
			</div>

			<div class="col-lg-8 portfolio-item border-0">
				<div class="card h-100">
					<div class="card-body">
						<h2 class="card-title">{{$data['product']->name}}</h2>
						<h5 class="card-text font-weight-bold">Price: {{$data['product']->price}} {{$data['product']->price_currency}} ({{$data['product']->weight}} {{$data['product']->weight_unit}})</h5>
						<div class="card-text">In Stock: {{$data['product']->stock}} {{$data['product']->weight_unit}}</div>

						<br>

						<form class="form-inline" action="{{ url('/') }}/add-to-cart" method="post">
							@csrf
							<input name="product_quantity" class="form-control col-lg-2 mr-sm-2" type="number" min="1" max="{{$data["product"]->stock}}" value="1">
							<input type="submit" class="btn btn-primary col-lg-2 my-2 my-sm-0" value="Add to Cart">

							<input type="hidden" name="product_id" value="{{$data["product"]->id}}">
						</form>

						<br>

						<span id="short_description" class="card-text">{{$data['product']->short_description}}</span>
						<a href="javascript:void(0)" id="show_more_product_details" onclick="showMoreProductDetails()">Show More >></a>
						<span id="long_description" class="card-text" style="display: none">{{$data['product']->long_description}}</span>

					</div>
				</div>
			</div>

		</div>

	</div>

@endsection



<script>
	function showMoreProductDetails()
	{
		if( document.getElementById("long_description").style.display == "none" )
		{
			document.getElementById("long_description").style.display = "block";
			document.getElementById("show_more_product_details").innerText = "Show Less <<";
		}
		else
		{
			document.getElementById("long_description").style.display = "none";
			document.getElementById("show_more_product_details").innerText = "Show More >>";
		}
	}
</script>