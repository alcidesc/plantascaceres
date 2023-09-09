<div>
	<header>
		<div class="container">
			<div class="row" style="padding-top: 10px;">
				<div class="col-md-4" align="center">
					<h1><a href="{{ url('/')}}"><img src="/images/empresa/{{ $empresa->logo }}" width="300px"></a></h1>
				</div>
				<div class="col-md-4" align="center">
					<br><p>{{ $empresa->direccion }}</p>
					
					<p class="para-y"><a href="https://maps.google.com/?q={{$empresa->latitud}},{{$empresa->longitud}}">Ver en Maps</a></p>
				</div>
				<div class="col-md-4" align="center">
					<br><a href="https://wa.me/{{ $empresa->whatsapp }}" target="_blank"><p><i class="bi bi-whatsapp"> {{ $empresa->whatsapp }}</i> </p></a>
					<p class="para-y"><a href="tel:{{ $empresa->telefono1 }}"><i class="bi bi-phone"></i> {{ $empresa->telefono1 }}</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>
</div>