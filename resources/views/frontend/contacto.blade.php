@extends('layouts.frontend')
@section('contenido')
	<!-- contact -->
	<div class="contact">
		<div class="container" style="margin-top: -50px;">
			<div class="row">
				<div class="col-md-12">
					<h3 class="tittle">Contacto</h3>
				</div>
				<div class="col-md-6">
					<h3 class="tittle" style="color:#eb646b;">Formulario de contacto</h3>
					<form action="{{ route('enviarcorreo') }}" method="post">
						@csrf
						<div class="contact-form2">
							<input type="text" name="nombre" placeholder="Nombre"  required>
							<input type="text" name="celular" placeholder="Celular"  required>
							<textarea type="text" name="mensaje" placeholder="Message..." required></textarea>
							<button type="submit" class="item_add single-item hvr-outline-out2 button2">Enviar</button>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<h3 class="tittle" style="color:#eb646b;">Ver en el mapa</h3>
					<!-- map -->
					<div class="frame">
						<style type="text/css">
							#mapa{border:0px solid #999;height:400px; border-radius: 10px;}
						</style>
						<div id="mapa" class="shadow"></div>
						<div id="tiempo"><br><button class="item_add single-item hvr-outline-out button2" onclick="calculartiempo({{$empresa->latitud}},{{$empresa->longitud}},'{{$empresa->nombre}}')" style="width: 100%">Calcular distancia y tiempo de llegada</button></div>
						<br><p align="center">Abrir en Google Maps <a href="https://maps.google.com/?q={{$empresa->latitud}},{{$empresa->longitud}}">Ver Instrucciones</a></p>
					</div>
					<!-- //map -->
				</div>
			</div>
		</div>
	</div>
	
	<!-- //contact -->
		
	<!-- //stats -->
	<script type="text/javascript" src="{{ asset('frontend/js/maps.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcQT0yBuaLXWdx6Mv_hAroOB0HLmNp5g&callback=Maps" async defer></script>
	<script>
		function Maps(){
			let lat = {{$empresa->latitud}};
			let lng = {{$empresa->longitud}};
			let empresa = '{{$empresa->nombre}}';
			let direccion = '{{$empresa->direccion}}';
			initMap(lat,lng,empresa,direccion);
		}        
	</script>
@stop