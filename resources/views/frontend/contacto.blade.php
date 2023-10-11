@extends('layouts.frontend')
@section('contenido')
<head>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

</head>
	<!-- contact -->
	<div class="contact">
		<div class="container" style="margin-top: -50px;">
			<div class="row">
				<div class="col-md-12">
					<h1 style="color:#eb646b; text-align: center;" class="tittle">Contacto</h1>
				</div>
				<div class="col-md-6">
					<h1 class="tittle" style="color:#eb646b;">Formulario de contacto</h1>
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
					<div class="row">
						<div class="col-12"><hr>
							<style type="text/css">
								#mapa{border:0px solid #999;height:250px; border-radius: 10px;}
							</style>
							<div id="mapa" class="shadow"></div>
							<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
							<br><p align="center">Abrir en Google Maps <a href="https://maps.google.com/?q={{$empresa->latitud}},{{$empresa->longitud}}">Ver Instrucciones</a></p>
						</div>
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
	<script> console.log('Hi!'); </script>
    <!-- Mostrando mapa y calculando distancias y tiempos -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('frontend/js/makermaps.js')}}" charset="utf-8"></script>
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
