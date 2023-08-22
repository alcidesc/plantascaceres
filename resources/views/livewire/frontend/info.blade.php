<div>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<!-- header -->
	<div class="header">
		<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"> <a href="https://maps.google.com/?q={{$empresa->latitud}},{{$empresa->longitud}}">{{ $empresa->direccion }}</a></li>
			<li><span class="glyphicon glyphicon-phone" aria-hidden="true"></span><a href="https://wa.me/{{ $empresa->whatsapp }}">{{ $empresa->whatsapp }}</a></li>
			<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><a href="tel:{{ $empresa->telefono1 }}">{{ $empresa->telefono1 }}</a></li>
		</ul>
		</div>
	</div>
	<!-- //header -->
	<!-- header-bot -->
	<div class="header-bot">
		<div class="container">
			<div class="col-md-3 header-left">
				<h1><a href="{{ url('/') }}"><img src="{{asset('images/empresa/'.$empresa->logo)}}"></a></h1>
			</div>
			<div class="col-md-6 header-middle" id="buscar">
				<marquee behavior="" direction=""> <!-- agregar texto --->
Venta de Plantas Ornamentales Florales Frutales  🧢🎒 - Realizamos envios a todo el territorio paraguayo 📦🚚</marquee>
			</div>
			<div class="col-md-3 header-right footer-bottom">
				<ul>
					@guest
						<li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"></a></li>
					@endguest
					@if(isset($empresa->facebook))
						<li><a class="fb" href="{{ $empresa->facebook }}"></a></li>
					@endif
					@if(isset($empresa->twitter))
						<li><a class="twi" href="{{ $empresa->twitter }}"></a></li>
					@endif
					@if(isset($empresa->instagram))
						<li><a class="insta" href="{{ $empresa->instagram }}"></a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	<!-- //header-bot -->
</div>