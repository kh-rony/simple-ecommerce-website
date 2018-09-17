@extends('layouts.app')

@section('title')
	Contact
@endsection

@section('content')

	<div class="container">

		<br>
		<br>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="card flex-md-row mb-4 box-shadow h-md-250">
					<!-- Contact Details Column -->
					<div class="col-lg-4 mb-4">
						<br>
						<h3>Contact Details</h3>
						<br>
						<p class="card-text text-dark"><strong>Phone: </strong>+88029834555</p>
						<p class="card-text text-dark"><strong>Email: </strong><a href="mailto:name@example.com">name@example.com</a></p>
						<p class="card-text text-dark">
							<strong>Address:</strong> Airport Road, Dhaka Cantonment, Dhaka - 1206
						</p>
					</div>

					<!-- Map Column -->
					<div class="col-lg-8 mb-4">
						<br>
						<!-- Embedded Google Map -->
						<iframe
							width="100%"
							height="400px"
							frameborder="0"
							scrolling="no"
							marginheight="0"
							marginwidth="0"
							src="http://maps.google.com/maps?q=Radisson+Blu+Dhaka+Water+Garden
								&t=m
								&z=16
								&output=embed
								&maptype=satellite">
						</iframe>
					</div>
				</div>
			</div>

		</div>
		<!-- /.row -->


	</div>

@endsection