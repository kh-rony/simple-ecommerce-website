@extends('layouts.app')

@section('title')
	About
@endsection

@section('content')

	<div class="container">

		<br>
		<br>

		<div class="row">
			<div class="col-lg-6">
				<img class="img-fluid rounded mb-4" src="{{url('/')}}/public/images/about-us.png" alt="">
			</div>
			<div class="col-lg-6">
				<h2>About Simple E-Commerce</h2>
				<br>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
			</div>
		</div>
		<!-- /.row -->

		<br>

		<!-- Team Members -->
		<h2>Our Team</h2>

		<div class="row">
			<div class="col-lg-4 mb-4">
				<div class="card h-100 text-center">
					<img class="card-img-top w-100" src="{{url('/')}}/public/images/team-member-1.png" alt="">
					<div class="card-body">
						<h4 class="card-title">Mr. John</h4>
						<h6 class="card-subtitle mb-2 text-muted">Founder & CEO</h6>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
					</div>
					<div class="card-footer">
						<strong>Email: </strong><a href="mailto:name@example.com">name@example.com</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4">
				<div class="card h-100 text-center">
					<img class="card-img-top w-100" src="{{url('/')}}/public/images/team-member-2.png" alt="">
					<div class="card-body">
						<h4 class="card-title">Mr. Steve</h4>
						<h6 class="card-subtitle mb-2 text-muted">Quality Assurance</h6>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
					</div>
					<div class="card-footer">
						<strong>Email: </strong><a href="mailto:name@example.com">name@example.com</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4">
				<div class="card h-100 text-center">
					<img class="card-img-top w-100" src="{{url('/')}}/public/images/team-member-3.png" alt="">
					<div class="card-body">
						<h4 class="card-title">Mr. Adil</h4>
						<h6 class="card-subtitle mb-2 text-muted">Customer Relationship</h6>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
					</div>
					<div class="card-footer">
						<strong>Email: </strong><a href="mailto:name@example.com">name@example.com</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->

		<br>

		<!-- Our Partners -->
		<h2>Our Partners</h2>
		<div class="row">
			<div class="col-lg-3 col-sm-4 mb-4">
				<img class="img-fluid" src="{{url('/')}}/public/images/our-partners-1.png" alt="">
			</div>
			<div class="col-lg-3 col-sm-4 mb-4">
				<img class="img-fluid" src="{{url('/')}}/public/images/our-partners-2.png" alt="">
			</div>
			<div class="col-lg-3 col-sm-4 mb-4">
				<img class="img-fluid" src="{{url('/')}}/public/images/our-partners-3.png" alt="">
			</div>
			<div class="col-lg-3 col-sm-4 mb-4">
				<img class="img-fluid" src="{{url('/')}}/public/images/our-partners-4.png" alt="">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-sm-4 mb-4">
				<img class="img-fluid" src="{{url('/')}}/public/images/our-partners-5.png" alt="">
			</div>
			<div class="col-lg-3 col-sm-4 mb-4">
				<img class="img-fluid" src="{{url('/')}}/public/images/our-partners-6.png" alt="">
			</div>
		</div>
		<!-- /.row -->

	</div>

@endsection