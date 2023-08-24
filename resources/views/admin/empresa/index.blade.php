@extends('adminlte::page')

@section('title', 'Perfil de Empresa')
<head>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>
@section('content_header')
 <h1>Perfil de Empresa </h1><hr>
@stop

@section('content')
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group" align="center">
                        <img src="{{asset('images/empresa/'.$empresa->logo)}}" class="img-responsive" alt="" style="width: 200px;" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Denominacion de la Empresa:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $empresa->nombre }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>RUC/CI:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $empresa->ruc }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="informacion">Descripción de la empresa:</label>
                        <p><?= $empresa->info ?></p>
                    </div>
                </div>
            </div>
	        <div class="row">
	       		<div class="col-md-4">
	                <label>Dirección</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->direccion }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <label>Teléfono de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->telefono1 }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-4">
		            <label>Fecha de fundación de la Empresa:</label>
		            <div class="input-group mb-3">
		                <div class="input-group-prepend">
		                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
		                </div>
		                <input type="text" class="form-control" value="{{ $empresa->fundacion }}" readonly>
		            </div>
		        </div>
	        </div>      
	        <div class="row">
	            <div class="col-md-6">
	                <label>Otro teléfono de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->telefono2 }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <label>Whatsapp de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fab fa-whatsapp"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->whatsapp }}" readonly>
	                </div>
	            </div>
	        </div>
	        <div class="row">        
	            <div class="col-md-6">
	                <label>Latitud de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-location-arrow"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->latitud }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <label>Longitud de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-location-arrow"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->longitud }}" readonly>
	                </div>
	            </div>
	        </div>
	        <div class="row">        
	            <div class="col-md-6">
	                <label>Facebook de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fab fa-facebook-f"></i></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->facebook }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <label>Instagram de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fab fa-instagram"></i></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->instagram }}" readonly>
	                </div>
	            </div>
	        </div>
	        <div class="row">        
	            <div class="col-md-6">
	                <label>Twitter de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fab fa-twitter"></i></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->twitter }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <label>Correo de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->correo }}" readonly>
	                </div>
	            </div>
	            @if ($empresa->delivery == 1)
	            	<div class="col-md-6">
		                <label>Limite de delivery:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
		                    </div>
		                    <input type="text" class="form-control" value="{{ $empresa->limitedelivery }} Km." readonly>
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Costo del delivery:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
		                    </div>
		                    @if ($empresa->costodelivery == "gratis")
		                    	<input type="text" class="form-control" value="Gratis" readonly>
		                    @elseif ($empresa->costodelivery == "fijo")
		                    	<input type="text" class="form-control" value="{{ $empresa->cotizaciondelivery }} ₲" readonly>
		                    @elseif ($empresa->costodelivery == "kilometro")
		                    	<input type="text" class="form-control" value="{{ $empresa->cotizaciondelivery }} ₲ por kilometro" readonly>
		                    @elseif ($empresa->costodelivery == "cotizar")
		                    	<input type="text" class="form-control" value="a cotizar" readonly>
		                    @endif
		                </div>
		            </div>
	            @endif
	        </div>
	        <div class="row">
	        	<div class="col-md-12" align="center">
	        		<b>Horario de atención</b><hr>
	        	</div>
	        	@if ($empresa->lunesingreso)
	        		<div class="col-md-3">
		        		<b>Lunes:</b><br>
		        		Desde las: {{ $empresa->lunesingreso }} hrs. - hasta las {{ $empresa->lunessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->martesingreso)
	        		<div class="col-md-3">
		        		<b>Martes:</b><br>
		        		Desde las: {{ $empresa->martesingreso }} hrs. - hasta las {{ $empresa->martessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->miercolesingreso)
	        		<div class="col-md-3">
		        		<b>Miércoles:</b><br>
		        		Desde las: {{ $empresa->miercolesingreso }} hrs. - hasta las {{ $empresa->miercolessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->juevesingreso)
	        		<div class="col-md-3">
		        		<b>Jueves:</b><br>
		        		Desde las: {{ $empresa->juevesingreso }} hrs. - hasta las {{ $empresa->juevessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->viernesingreso)
	        		<div class="col-md-3">
		        		<b>Viernes:</b><br>
		        		Desde las: {{ $empresa->viernesingreso }} hrs. - hasta las {{ $empresa->viernessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->sabadoingreso)
	        		<div class="col-md-3">
		        		<b>Sábado:</b><br>
		        		Desde las: {{ $empresa->sabadoingreso }} hrs. - hasta las {{ $empresa->sabadosalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->domingoingreso)
	        		<div class="col-md-3">
		        		<b>Domingo:</b><br>
		        		Desde las: {{ $empresa->domingoingreso }} hrs. - hasta las {{ $empresa->domingosalida }} hrs.
		        	</div>
	        	@endif
	        </div>
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
    	</div>
    	<div class="card-footer" align="center">
            <a href="empresa/{{ $empresa->id }}/edit"><button type="button" class="btn btn-info"><i class="fas fa-save"></i> Editar Empresa</button></a>
        </div>
    </div>
@stop

@section('js')
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
    <!-- Fin Mapas -->
@stop
