@extends('layouts.app')

@section('title')
	Checkout
@endsection

@section('content')

	<div class="container">

		<br>
		<br>

		@if( isset($data['temp_orders']) && count($data['temp_orders'] ) )

			<div class="row">

				<div class="col-md-4 order-md-2 mb-4">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
						<span class="text-muted">Your cart</span>
						<span class="badge badge-secondary badge-pill">{{$data['total_items']}}</span>
					</h4>

					<ul class="list-group mb-3">
						@for( $i = 0; $i < sizeof($data['temp_orders']); $i++ )
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">{{ $data['temp_orders'][$i]->product_name }}</h6>
									<small class="text-muted">Quantity: {{ $data['temp_orders'][$i]->product_quantity }} {{ $data['temp_orders'][$i]->weight_unit }}</small>
								</div>
								<span class="text-muted">{{ $data['product_price'][$i] }}</span>
							</li>
						@endfor
						<li class="list-group-item d-flex justify-content-between bg-light">
							<div class="text-success">
								<h6 class="my-0">Promo code</h6>
								<small>No Promo Code Applied</small>
							</div>
							<span class="text-success">0</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span>Total (BDT)</span>
							<strong>{{  $data['total_price'] }}</strong>
						</li>
					</ul>

					<form class="card p-2" method="post">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter Promo code">
							<div class="input-group-append">
								<button type="submit" class="btn btn-secondary">Apply</button>
							</div>
						</div>
					</form>
				</div>


				<div class="col-md-8 order-md-1">
					<h4 class="mb-3">Billing address</h4>

					<form method="post" action="{{url('/')}}/place-order">
						@csrf
						<div class="mb-3">
							<label>Customer Name</label>
							<input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="" required>
							<div class="invalid-feedback">
								Please enter a valid name for shipping updates.
							</div>
						</div>

						<div class="mb-3">
							<label>Email</label>
							<input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="" required>
							<div class="invalid-feedback">
								Please enter a valid email address for shipping updates.
							</div>
						</div>

						<div class="mb-3">
							<label>Contact No.</label>
							<input type="number" class="form-control" name="contact_number" placeholder="" required>
							<div class="invalid-feedback">
								Please enter a valid email address for shipping updates.
							</div>
						</div>

						<div class="mb-3">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" placeholder="" required>
							<div class="invalid-feedback">
								Please enter your shipping address.
							</div>
						</div>

						<div class="row">
							<div class="col-md-5 mb-3">
								<label>Country</label>
								<select class="custom-select d-block w-100" name="country" required>
									<option value="">Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
								</select>
								<div class="invalid-feedback">
									Please select a valid country.
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label>State</label>
								<select class="custom-select d-block w-100" name="state" required>
									<option value="">Choose...</option>
									<option value="Dhaka">Dhaka</option>
								</select>
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label>Zip</label>
								<input type="text" class="form-control" name="zip" placeholder="" required>
								<div class="invalid-feedback">
									Zip code required.
								</div>
							</div>
						</div>

						<hr class="mb-4">

						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="save-info">
							<label class="custom-control-label" for="save-info">Save this information for next time</label>
						</div>

						<hr class="mb-4">


						<h4 class="mb-3">Payment</h4>

						<div class="d-block my-3">
							<div class="custom-control custom-radio">
								<input type="radio" name="cardType" id="credit" class="custom-control-input" value="credit" required checked/>
								<label class="custom-control-label" for="credit">Credit Card</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" name="cardType" id="debit" class="custom-control-input" value="debit" required/>
								<label class="custom-control-label" for="debit">Debit Card</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" name="cardType" id="paypal" class="custom-control-input" value="paypal" required/>
								<label class="custom-control-label" for="paypal">Paypal</label>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<label>Name on card</label>
								<input type="text" class="form-control" name="nameOnCard" placeholder="" required>
								<small class="text-muted">Full name as displayed on card</small>
								<div class="invalid-feedback">
									Name on card is required
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>Card number</label>
								<input type="text" class="form-control" name="cardNumber" placeholder="" required>
								<div class="invalid-feedback">
									Card number is required
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-3">
								<label>Expiration Year</label>
								<select class="custom-select d-block w-100" name="cardExpirationYear" required>
									<option value="">Choose...</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
								</select>
								<div class="invalid-feedback">
									Expiration year required
								</div>
							</div>

							<div class="col-md-3 mb-3">
								<label>Expiration Month</label>
								<select class="custom-select d-block w-100" name="cardExpirationMonth" required>
									<option value="">Choose...</option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
								<div class="invalid-feedback">
									Expiration month required
								</div>
							</div>

							<div class="col-md-3 mb-3">
								<label>CVV</label>
								<input type="text" class="form-control" name="cardCVV" placeholder="" required>
								<div class="invalid-feedback">
									Security code required
								</div>
							</div>
						</div>

						<hr class="mb-4">

						<button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>

					</form>

				</div>
			</div>

		@else
		@endif

	</div>

@endsection