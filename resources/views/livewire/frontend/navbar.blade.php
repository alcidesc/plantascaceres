<header id="site-header" class="fixed-top">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light stroke py-lg-0">
			<h1><a class="navbar-brand pe-xl-5 pe-lg-4" href="index.html">
					M<span class="log">ovitech</span>
				</a></h1>
			<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
				<span class="navbar-toggler-icon fa icon-close fa-times"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarScroll">
				 <ul class="navbar-nav me-lg-auto my-2 my-lg-0 navbar-nav-scroll">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.html">Sobre Nosotros</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="services.html">Servicios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.html">Contacto</a>
					</li>
				</ul> 
				<!--/search-right-->
				<ul class="header-search d-flex mx-lg-4">
					<li class="nav-item search-right">
						<a href="#search" class="" title="search"> <span class="fas fa-search me-lg-4" aria-hidden="true"></span></a>
						<!-- search popup -->
						<div id="search" class="pop-overlay">
							<div class="popup">
								<h3 class="title-w3l two mb-4 text-left">Search Here</h3>
								<form action="#" method="GET" class="search-box d-flex position-relative">
									<input type="search" placeholder="Enter Keyword here" name="search" required="required" autofocus="">
									<button type="submit" class="btn btn-primary"><span class="fas fa-search" aria-hidden="true"></span></button>
								</form>
							</div>
							<a class="close" href="#close">×</a>
						</div>
						<!-- /search popup -->
					</li>
				
					<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav menu__list">
							 {{-- <li class="@if($_SERVER['REQUEST_URI']=== '/') active menu__item--current @endif  menu__item "><a class="menu__link" href="{{ url('/') }}">Principal</a></li>
							<li class="@if($_SERVER['REQUEST_URI']=== '/quienessomos') active menu__item--current @endif menu__item"><a class="menu__link" href="/quienessomos">Quienes Somos</a></li>
							<li class="@if($_SERVER['REQUEST_URI']=== '/productos') active menu__item--current @endif menu__item"><a class="menu__link" href="/productos">Productos</a></li>
							<li class="@if($_SERVER['REQUEST_URI']=== '/contacto') active menu__item--current @endif menu__item"><a class="menu__link" href="/contacto">Contacto</a></li>  --}}
							@guest
								<li class="menu__item"><a href="{{ url('/login') }}" class="menu__link">Iniciar Sesión</a></li>
							@else
								<li class="dropdown menu__item">
									<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="row">
											<div class="col-sm-9 multi-gd-img">
												<ul class="multi-column-dropdown">
													@if (Auth::user()->nivel == 1)
														<li><a href="{{ url('/dashboard') }}">Panel de Control</a></li>
													@endif
													<li><a href="{{ url('/perfil') }}" @if($_SERVER["REQUEST_URI"]=== '/perfil') class='active' @endif>Perfil</a></li>
													<li><a href="{{ url('/verproductos') }}" @if($_SERVER["REQUEST_URI"]=== '/verproductos') class='active' @endif>Mis Pedidos</a></li>
													<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
																document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														@csrf
													</form>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
							@endguest
						</ul>
					</div>
				</ul>
				<!--//search-right-->
			</div>
			<!-- toggle switch for light and dark theme -->
			<div class="mobile-position">
				<nav class="navigation">
					<div class="theme-switch-wrapper">
						<label class="theme-switch" for="checkbox">
							<input type="checkbox" id="checkbox">
							<div class="mode-container">
								<i class="gg-sun"></i>
								<i class="gg-moon"></i>
							</div>
						</label>
					</div>
				</nav>
			</div>
			<!-- //toggle switch for light and dark theme -->
		</nav>
	</div>
	{{-- <div class="top_nav_right">
		<div class="cart box_1">
			@php	$precio=0;		@endphp
			@foreach (Cart::getContent() as $value)
				@php	$precio+=$value->price*$value->quantity;	@endphp
			@endforeach
			<a data-toggle="modal" data-target="#exampleModalCenter"> 
				<h3> <div class="total">
					<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
					<span>{{number_format($precio, 0, '', '.') }} ₲ </span> (<span>{{count(Cart::getContent())}}</span> items)</div>
				</h3>
			</a>
			<p data-toggle="modal" data-target="#exampleModalCenter">.</p>
		</div>	
	</div> --}}
</header>
<!-- login -->
<div class="modal fade" wire:ignore.self id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div>
			<div class="modal-body modal-spa">
					
				<form action="/login" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12">
									<h3 style="color: #eb646b">Iniciar <span>sesión</span></h3><br>
								</div>
								{{-- Email field --}}
								<div class="col-md-12">
									<input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
										value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus required>
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
										</div>
									</div>
									@if($errors->has('email'))
										<div class="invalid-feedback">
											<strong>{{ $errors->first('email') }}</strong>
										</div>
									@endif
								</div>

								{{-- Password field --}}
								<div class="col-md-12"><br>
									<input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
										placeholder="{{ __('adminlte::adminlte.password') }}" required>
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
										</div>
									</div><br>
									@if($errors->has('password'))
										<div class="invalid-feedback">
											<strong>{{ $errors->first('password') }}</strong>
										</div>
									@endif
								</div>
							</div>
							<div class="row">
								{{-- Login field --}}
								<div class="col-md-6">
									<div class="icheck-primary">
										<input type="checkbox" name="remember" id="remember">
										<label for="remember">{{ __('adminlte::adminlte.remember_me') }}</label>
									</div><br>
								</div>
								<div class="col-md-6">
									<button type=submit class="item_add single-item hvr-outline-out btn-block">
										<span class="fas fa-sign-in-alt"></span>
										{{ __('adminlte::adminlte.sign_in') }}
									</button>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
				</form>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8" align="right">
						{{-- Password reset link --}}
						<p class="my-0">
							<a href="/forgot-password" style="color: #eb646b">
								{{ __('adminlte::adminlte.i_forgot_my_password') }}
							</a>
						</p>

						{{-- Register link --}}
						<p class="my-0">
							<a href="/register" style="color: #eb646b">
								{{ __('adminlte::adminlte.register_a_new_membership') }}
							</a>
						</p>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		
		</div>
	</div>
</div>
<!-- //login -->
</div>