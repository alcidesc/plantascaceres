@extends('adminlte::page')

@section('title', 'Perfil de Empresa')

@section('content_header')
 <h1>Perfil de Empresa </h1><hr>
@stop

@section('content')
 	<style>
        /*-----  Css de botones para subir imagenes -----*/
        .thumb {
            width: 200px;
            border: 0px solid #000;
            margin: 10px 5px 0 0;
        }
        .yourBtn {
            width: 200px;
            padding: 10px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border: 1px dashed #BBB;
            text-align: center;
            cursor: pointer;
            margin: 0 auto;
        }
    </style>
	<head>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
	</head>
    {!! Form::model($empresa,['method'=>'PATCH','route'=>['empresa.update',$empresa->id],'files'=>'true']) !!}
	{{Form::token()}}

		<div class="card">
	        <div class="card-body">
	            <div class="row">
                    <div class="col-12">
                        <div class="form-group" align="center">
                            <label>Logotipo dela empresa:</label><br>
                            <output id="list">
                            	@if ($empresa->logo)
                            		<img src="{{asset('images/empresa/'.$empresa->logo)}}" class="img-responsive" alt="" style="width: 200px;" />
                            	@else
                            		<img src="{{asset('imgsystem/producto.png')}}" class="img-responsive" alt="" style="width: 200px;" />
                            	@endif
                            </output>
                            <div class="yourBtn" onclick="getFile()">
                                <img src="{{asset('imgsystem/flechita.svg')}}" alt=""> <span>Subir Imagen&hellip;</span>
                            </div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'>
                                <input id="files" type="file" value="upload" name="logo" onchange="sub(this)" accept="image/jpeg, image/png, image/bmp" />
                            </div>
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
	                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ $empresa->nombre }}" name="nombre" placeholder="Denominación de la Empresa" required>
	                        @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <label>RUC/CI:</label>
	                    <div class="input-group mb-3">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
	                        </div>
	                        <input type="text" class="form-control @error('ruc') is-invalid @enderror" value="{{ $empresa->ruc }}" name="ruc" placeholder="RUC de la Empresa" required>
	                        @error('ruc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
	                    </div>
	                </div>
	            </div>
	            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="informacion">Descripción de la Empresa</label>
                            <textarea name="info" id="informacion" class="textarea form-control" style="width: 100%" placeholder="Escriba el cuerpo del mensaje" cols="30" rows="10" required>{{ $empresa->info }}</textarea>
                            @error('info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" class="form-control  @error('direccion') is-invalid @enderror" value="{{ $empresa->direccion }}" name="direccion" placeholder="Dirección de la Empresa" required>
	                        @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-4">
		                <label>Teléfono de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></i></span>
		                    </div>
		                    <input type="text" class="form-control @error('telefono1') is-invalid @enderror" value="{{ $empresa->telefono1 }}" name="telefono1" placeholder="Teléfono de la Empresa" required>
	                        @error('telefono1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-4">
			            <label>Fecha de fundación de la Empresa:</label>
			            <div class="input-group mb-3">
			                <div class="input-group-prepend">
			                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></i></span>
			                </div>
			                <input type="date" class="form-control @error('fundacion') is-invalid @enderror" value="{{ $empresa->fundacion }}" name="fundacion" placeholder="Fecha de fundación de la Empresa" required>
	                        @error('fundacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" class="form-control @error('telefono2') is-invalid @enderror" value="{{ $empresa->telefono2 }}" name="telefono2" placeholder="Otro Teléfono de la Empresa">
	                        @error('telefono2')
	                        	<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Whatsapp de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fab fa-whatsapp"></i></i></span>
		                    </div>
		                    <input type="text" class="form-control @error('Whatsapp') is-invalid @enderror" value="{{ $empresa->whatsapp }}" name="whatsapp" placeholder="Whatsapp de la Empresa">
	                        @error('whatsapp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" id="id_lat" class="form-control @error('latitud') is-invalid @enderror" value="{{ $empresa->latitud }}" name="latitud" placeholder="Latitud de la Empresa" required>
	                        @error('latitud')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Longitud de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-location-arrow"></i></i></span>
		                    </div>
		                    <input type="text" id="id_lng" class="form-control @error('longitud') is-invalid @enderror" value="{{ $empresa->longitud }}" name="longitud" placeholder="Longitud de la Empresa" required>
	                        @error('longitud')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{ $empresa->facebook }}" name="facebook" placeholder="Facebook de la Empresa">
	                        @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Instagram de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fab fa-instagram"></i></i></i></span>
		                    </div>
		                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" value="{{ $empresa->instagram }}" name="instagram" placeholder="Instagram de la Empresa">
	                        @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" class="form-control @error('twitter') is-invalid @enderror" value="{{ $empresa->twitter }}" name="twitter" placeholder="Twitter de la Empresa">
	                        @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Correo de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></i></i></span>
		                    </div>
		                    <input type="mail" class="form-control @error('correo') is-invalid @enderror" value="{{ $empresa->correo }}" name="correo" placeholder="Correo de la Empresa">
	                        @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-12">
		            	<label>¿Cuenta con delivery?</label>
		            	<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<div class="input-group-text">
						      		<input type="checkbox" {{ ($empresa->delivery == 1) ? "checked" : "" }} name="delivery" id="delivery" aria-label="Checkbox for following text input">
						    	</div>
						  	</div>
						  	<input type="number" min="0" class="form-control" id="deliverykm" name="limitedelivery" aria-label="Text input with checkbox" value="{{ $empresa->limitedelivery }}" placeholder="Agregar kilometros de alcance" {{ ($empresa->delivery) ? "" : "readonly" }}> Km.
						</div>
		            </div>
		        </div>
		        <div class="row" id="pagodelivery" style="{{ ($empresa->delivery) ? "" : "display: none !important;" }}">
		        	<div class="col-12" align="center">
		        		<label>Selecciona tu forma de pago para delivery</label>
		        	</div>
		            <div class="col-3">
		            	<label>Gratis</label>
					  	<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<div class="input-group-text">
						      		<input type="radio" {{ ($empresa->costodelivery == "gratis") ? "checked" : "" }} value="gratis" name="forma" >
						    	</div>
						  	</div>
						  	<input type="text" id="gratis" class="form-control" value="{{ ($empresa->costodelivery == "gratis") ? "Gratis" : "" }}" readonly> 
						</div>
		            </div>
		            <div class="col-3">
		            	<label>Costo fijo</label>
		            	<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<div class="input-group-text">
						      		<input type="radio" value="fijo" name="forma" {{ ($empresa->costodelivery == "fijo") ? "checked" : "" }}>
						    	</div>
						  	</div>
						  	<input type="number" min="0" class="form-control" id="fijo" name="costofijo" value="{{ ($empresa->costodelivery == "fijo") ? "$empresa->cotizaciondelivery" : "" }}" placeholder="Agregar costo fijo" {{ ($empresa->costodelivery == "fijo") ? "" : "readonly" }}> 
						</div>
		            </div>
		            <div class="col-3">
		            	<label>Cobro por kilometro</label>
		            	<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<div class="input-group-text">
						      		<input type="radio" value="kilometro" name="forma" {{ ($empresa->costodelivery == "kilometro") ? "checked" : "" }}>
						    	</div>
						  	</div>
						  	<input type="number" min="0" class="form-control" name="costokilometro" id="kilometro" value="{{ ($empresa->costodelivery == "kilometro") ? "$empresa->cotizaciondelivery" : "" }}" placeholder="Agregar costo por kilometro" {{ ($empresa->costodelivery == "kilometro") ? "" : "readonly" }}>
						</div>
		            </div>
		            <div class="col-3">
		            	<label>A cotizar</label>
		            	<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<div class="input-group-text">
						      		<input type="radio" value="cotizar" name="forma" {{ ($empresa->costodelivery == "cotizar") ? "checked" : "" }}>
						    	</div>
						  	</div>
						  	<input type="text" id="cotizar" class="form-control" value="{{ ($empresa->costodelivery == "cotizar") ? "a cotizar" : "" }}" readonly> 
						</div>
		            </div>
		        </div>
		        <div class="row">
		        	<div class="col-md-12" align="center">
		        		<b>Horario de atención</b><hr>
		        	</div>
	        		<div class="col-md-3">
	        			<b>Lunes:</b><br>
		        		<div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Apertura</span>
		                    </div>
		                    <input type="time" class="form-control @error('lunesingreso') is-invalid @enderror" value="{{ $empresa->lunesingreso }}" name="lunesingreso">
	                        @error('lunesingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Cierre</span>
		                    </div>
		                    <input type="time" class="form-control @error('lunessalida') is-invalid @enderror" value="{{ $empresa->lunessalida }}" name="lunessalida">
	                        @error('lunessalida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		        	</div>
	        		<div class="col-md-3">
		        		<b>Martes:</b><br>
		        		<div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Apertura</span>
		                    </div>
		                    <input type="time" class="form-control @error('martesingreso') is-invalid @enderror" value="{{ $empresa->martesingreso }}" name="martesingreso">
	                        @error('martesingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Cierre</span>
		                    </div>
		                    <input type="time" class="form-control @error('martessalida') is-invalid @enderror" value="{{ $empresa->martessalida }}" name="martessalida">
	                        @error('martessalida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		        	</div>
	        		<div class="col-md-3">
		        		<b>Miércoles:</b><br>
		        		<div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Apertura</span>
		                    </div>
		                    <input type="time" class="form-control @error('miercolesingreso') is-invalid @enderror" value="{{ $empresa->miercolesingreso }}" name="miercolesingreso">
	                        @error('miercolesingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Cierre</span>
		                    </div>
		                    <input type="time" class="form-control @error('miercolessalida') is-invalid @enderror" value="{{ $empresa->miercolessalida }}" name="miercolessalida">
	                        @error('miercolessalida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		        	</div>
	        		<div class="col-md-3">
		        		<b>Jueves:</b><br>
		        		<div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Apertura</span>
		                    </div>
		                    <input type="time" class="form-control @error('juevesingreso') is-invalid @enderror" value="{{ $empresa->juevesingreso }}" name="juevesingreso">
	                        @error('juevesingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Cierre</span>
		                    </div>
		                    <input type="time" class="form-control @error('juevessalida') is-invalid @enderror" value="{{ $empresa->juevessalida }}" name="juevessalida">
	                        @error('juevessalida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		        	</div>
	        		<div class="col-md-4">
		        		<b>Viernes:</b><br>
		        		<div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Apertura</span>
		                    </div>
		                    <input type="time" class="form-control @error('viernesingreso') is-invalid @enderror" value="{{ $empresa->viernesingreso }}" name="viernesingreso">
	                        @error('viernesingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Cierre</span>
		                    </div>
		                    <input type="time" class="form-control @error('viernessalida') is-invalid @enderror" value="{{ $empresa->viernessalida }}" name="viernessalida">
	                        @error('viernessalida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		        	</div>
	        		<div class="col-md-4">
		        		<b>Sábado:</b><br>
		        		<div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Apertura</span>
		                    </div>
		                    <input type="time" class="form-control @error('sabadoingreso') is-invalid @enderror" value="{{ $empresa->sabadoingreso }}" name="sabadoingreso">
	                        @error('sabadoingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Cierre</span>
		                    </div>
		                    <input type="time" class="form-control @error('sabadosalida') is-invalid @enderror" value="{{ $empresa->sabadosalida }}" name="sabadosalida">
	                        @error('sabadosalida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		        	</div>
	        		<div class="col-md-4">
		        		<b>Domingo:</b><br>
		        		<div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Apertura</span>
		                    </div>
		                    <input type="time" class="form-control @error('domingoingreso') is-invalid @enderror" value="{{ $empresa->domingoingreso }}" name="domingoingreso">
	                        @error('domingoingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Cierre</span>
		                    </div>
		                    <input type="time" class="form-control @error('domingosalida') is-invalid @enderror" value="{{ $empresa->domingosalida }}" name="domingosalida">
	                        @error('domingosalida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		        	</div>
		        </div>
		        <div class="row">
		            <div class="col-md-12">
		            	<div class="form-group"><br>
			                <label><b>Marcar ubicación de la empresa:</b></label>
			                <style type="text/css">
			                    #mapa{border:1px solid #999;height:200px}
			                    #mapa img{max-width:none}
			                </style>
			                <div id="mapa"></div>
							<!--Script del mapa-->
							<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
			            </div>
		            </div>
		        </div>
	    	</div>
	    	<div class="card-footer" align="center">
	            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Guardar Cambios</button>
	        </div>
	    </div>
 	{!!Form::close()!!}
 	<script>
        function archivo(evt) {
            var files = evt.target.files; // FileList object
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }
                 
                var reader = new FileReader();
                 
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Insertamos la imagen
                        document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
                 
                reader.readAsDataURL(f);
            }
        }
                 
        document.getElementById('files').addEventListener('change', archivo, false);

        function getFile() {
            document.getElementById("files").click();
        }

            function sub(obj) {
            var file = obj.value;
            var fileName = file.split("\\");
            //document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
            event.preventDefault();
        }

        var checkbox = document.getElementById('delivery');
		checkbox.addEventListener("change", validaCheckbox, false);
		function validaCheckbox(){
		  	var checked = checkbox.checked;
		  	if(checked){
		    	$("#deliverykm").attr("readonly", false); 
		    	$("#deliverykm").attr("required", true);
		    	$("#pagodelivery").show();
		  	}else{
		  		$("#deliverykm").attr("readonly", true);
		  		$("#deliverykm").attr("required", false);
		  		$("#deliverykm").val("");
		  		$("#pagodelivery").attr( "style", "display: none !important;" );
		  		$("#gratis").val("");
        		$("#fijo").attr("readonly", true);
        		$("#kilometro").attr("readonly", true);
        		$("#cotizar").val("");
		  	}
		}
		
    </script>
@stop
 <!--scripts de mapas-->
@section('js')
    <!--js para editar o marcar ubicación google maps -->
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('frontend/js/makermaps.js')}}" charset="utf-8"></script>
    <script>marcar({{$empresa->latitud}}, {{$empresa->longitud}});</script>

    <script>
        $(function () {
            // Summernote
            $('#informacion').summernote({
                height: '100%',
            });
        });
        $(':radio').change(function() {
        	if(this.value == "gratis"){
        		$("#gratis").val("Gratis");
        		$("#fijo").attr("readonly", true);
        		$("#kilometro").attr("readonly", true);
        		$("#cotizar").val("");
        	}else if(this.value == "fijo"){
        		$("#gratis").val("");
        		$("#fijo").attr("readonly", false);
        		$("#kilometro").attr("readonly", true);
        		$("#cotizar").val("");
        	}else if(this.value == "kilometro"){
        		$("#gratis").val("");
        		$("#fijo").attr("readonly", true);
        		$("#kilometro").attr("readonly", false);
        		$("#cotizar").val("");
        	}else if(this.value == "cotizar"){
        		$("#gratis").val("");
        		$("#fijo").attr("readonly", true);
        		$("#kilometro").attr("readonly", true);
        		$("#cotizar").val("a cotizar");
        	}
	    });
    </script>

@stop

