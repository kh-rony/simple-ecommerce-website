@extends('layouts.app')

@section('title')
	Cart
@endsection

@section('content')

	<div class="container">

		<br>
		<br>

		@if( isset($data['temp_orders']) && count($data['temp_orders'] ) )

			<table class="table table-hover table-bordered">
				<thead>
				<tr>
					<th>Product Name</th>
					<th>Price Per Item (Taka)</th>
					<th>Quantity</th>
					<th>Total Price (Taka)</th>
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>

				@for( $i = 0; $i < sizeof($data['temp_orders']); $i++ )
					<tr>
						<td>{{  $data['temp_orders'][$i]->product_name }}</td>
						<td>{{  $data['temp_orders'][$i]->product_price }}</td>
						<td>
							<form method="post" action="{{ url('/') }}/update-quantity" class="form-inline">
								@csrf
								<input type="number" class="form-control col-md-3 mr-sm-2" name="product_quantity" value="{{ $data['temp_orders'][$i]->product_quantity }}" min="1"/>
								<input type="submit" class="btn btn-secondary btn-sm my-sm-0" value="Update Quantity">

								<input type="hidden" name="temp_order_id" value="{{ $data['temp_orders'][$i]->id }}">
							</form>
						</td>
						<td>{{ $data['product_price'][$i] }}</td>
						<td>
							<form method="post" action="{{ url('/') }}/remove-item-from-cart" onsubmit="return confirmRemoveItem()">
								@csrf
								<input type="submit" class="btn btn-outline-danger btn-sm" value="Remove Item">

								<input type="hidden" name="temp_order_id" value="{{ $data['temp_orders'][$i]->id }}">
							</form>
						</td>
					</tr>

				@endfor

				<tr>
					<td colspan="3"></td>
					<td><strong>Total Price: </strong>{{ $data['total_price'] }}</td>
					<td></td>
				</tr>
				</tbody>
			</table>

			<br>

			<div class="row">
				<button type="button" class="btn btn-primary mr-sm-2" onclick="location.href='{{ url('/') }}'">Coninue Shopping</button>
				<button type="button" class="btn btn-success mr-sm-2" onclick="location.href='{{ url('/') }}/checkout'">Checkout</button>
				<a class="btn btn-danger mr-sm-2" href="{{ url('/') }}/remove-all-items-from-cart" onclick="return confirmRemoveAllItems()">Remove All Items</a>
			</div>
		@else
			<div> Cart is empty! Please Select Product to Buy!</div>
		@endif

	</div>

@endsection



<script>
	function confirmRemoveItem()
	{
		return confirm("Are you sure you want to remove this item from cart ?");
	}

	function confirmRemoveAllItems()
	{
		return confirm("Are you sure you want to remove all items from cart ?");
	}
</script>