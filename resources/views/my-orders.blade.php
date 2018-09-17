@extends('layouts.app')

@section('title')
	My Orders
@endsection

@section('content')

	<div class="container">

		<br>
		<br>

		@if( isset($data['orders']) && count($data['orders'] ) )

			<table class="table table-hover table-bordered">
				<thead>
				<tr>
					<th>Order ID</th>
					<th>Customer Name</th>
					<th>Email</th>
					<th>Contact No.</th>
					<th>Total Price (Taka)</th>
					<th>Card Type</th>
					<th>Order Status</th>
				</tr>
				</thead>
				<tbody>

				@for( $i = 0; $i < sizeof($data['orders']); $i++ )
					<tr>
						<td>{{  $data['orders'][$i]->id }}</td>
						<td>{{  $data['orders'][$i]->name }}</td>
						<td>{{  $data['orders'][$i]->email }}</td>
						<td>{{  $data['orders'][$i]->contact_number }}</td>
						<td>{{  $data['orders'][$i]->total_price }}</td>
						<td>{{  $data['orders'][$i]->card_type }}</td>
						<td>{{  $data['orders'][$i]->order_status }}</td>
					</tr>

				@endfor

				</tbody>
			</table>

		@else
			<div class="row">
				<div> No order is found!</div>
			</div>
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