<!-- Navigation -->
<header>
	<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #e3f2fd;">

		<a class="navbar-brand" href="{{url('/')}}">Simple E-Commerce</a>

		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="justify-content-end navbar-nav ml-auto">

				<li class="nav-item">
					<a class="nav-link" href="{{url('/')}}">Home</a>
				</li>

				@if( Route::has('login') && Auth::check() && Auth::user()->user_type == 1 )
					@auth
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin Options</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{url('/manage-products')}}">Manage Products</a>
							</div>
						</li>
					@else
					@endauth
				@endif

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
					   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{url('/')}}/search-products/fruit">Fruit</a>
						<a class="dropdown-item" href="{{url('/')}}/search-products/vegetable">Vegetable</a>
						<a class="dropdown-item" href="{{url('/')}}/search-products/furniture">Furniture</a>
						<a class="dropdown-item" href="{{url('/')}}/search-products/smartphone">Smartphone</a>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{url('/')}}/about">About</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{url('/')}}/contact">Contact</a>
				</li>

				<li class="nav-item">
					<form method="post" action="{{url('/')}}/search-products" class="form-inline mt-2 mt-md-0 ml-2">
						@csrf
						<input type="text" name="searchbox" class="form-control mr-sm-2" placeholder="Search Product" aria-label="Search">
						<button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
					</form>
				</li>

				<li class="nav-item ml-3">
					<a class="nav-link" href="{{url('/')}}/cart">Cart</a>
				</li>

				@if (Route::has('login'))
					@auth
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

								<a class="dropdown-item" href="{{url('/my-orders')}}">My Orders</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}"
								   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								Login / Register<span class="caret"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
								<a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
							</div>
						</li>
					@endauth
				@endif

			</ul>

		</div>
	</nav>

</header>