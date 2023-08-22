<div>
	<div class="w3ls-section wthree-pricing">
		<div class="container mt-3">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Horarios <span>Disponibles</span></h3>
			</div>
     		<div class="row">
     			@php
     				$dias = array();
     			@endphp
	        	@if ($empresa->lunesingreso)
	        		@php
	        			array_push($dias, "lunes");
	        		@endphp
	        		<div class="col-md-3">
		        		<b>Lunes:</b><br>
		        		Desde las: {{ $empresa->lunesingreso }} hrs. - hasta las {{ $empresa->lunessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->martesingreso)
	        		@php
	        			array_push($dias, "martes");
	        		@endphp
	        		<div class="col-md-3">
		        		<b>Martes:</b><br>
		        		Desde las: {{ $empresa->martesingreso }} hrs. - hasta las {{ $empresa->martessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->miercolesingreso)
	        		@php
	        			array_push($dias, "miercoles");
	        		@endphp
	        		<div class="col-md-3">
		        		<b>Miércoles:</b><br>
		        		Desde las: {{ $empresa->miercolesingreso }} hrs. - hasta las {{ $empresa->miercolessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->juevesingreso)
	        		@php
	        			array_push($dias, "jueves");
	        		@endphp
	        		<div class="col-md-3">
		        		<b>Jueves:</b><br>
		        		Desde las: {{ $empresa->juevesingreso }} hrs. - hasta las {{ $empresa->juevessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->viernesingreso)
	        		@php
	        			array_push($dias, "viernes");
	        		@endphp
	        		<div class="col-md-3">
		        		<b>Viernes:</b><br>
		        		Desde las: {{ $empresa->viernesingreso }} hrs. - hasta las {{ $empresa->viernessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->sabadoingreso)
	        		@php
	        			array_push($dias, "sabado");
	        		@endphp
	        		<div class="col-md-3">
		        		<b>Sábado:</b><br>
		        		Desde las: {{ $empresa->sabadoingreso }} hrs. - hasta las {{ $empresa->sabadosalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->domingoingreso)
	        		@php
	        			array_push($dias, "domingo");
	        		@endphp
	        		<div class="col-md-3">
		        		<b>Domingo:</b><br>
		        		Desde las: {{ $empresa->domingoingreso }} hrs. - hasta las {{ $empresa->domingosalida }} hrs.
		        	</div>
	        	@endif
	        </div>
			<div class="clearfix"> </div><br>
			<h3 class="w3l_header"></h3><br>
			<p align="center">Dejanos saber tu horario disponible y nos comunicamos contigo para confirmar la reserva.</p>
			<div class="row">
				{!! Form::open(array('url'=>'enviarsolicitud','method'=>'POST','autocomplete'=>'off')) !!}
    			{{Form::token()}}
	    			<div class="col-md-6">
						<div class="form-group">
							<label for="dia">Día de cita</label><br>
		 					<select class="form-control" aria-label="dia" name="cita_dia" wire:model="dia" wire:click="changeEvent($event.target.value)" style="text-transform: uppercase;border:1px solid black" required>
							  	<option value="" selected>Seleccione un día</option>
							  	@foreach ($dias as $element)
							  		<option value="{{ $element }}">{{ $element }}</option>
							  	@endforeach
							</select>
						</div>
			 		</div>
		    		<div class="col-md-6">
		        		<div class="form-group">
							<label for="dia">Ingrese su horario disponible</label><br>
		                    <input type="time" class="form-control" name="cita_hora" min="{{ $minimo }}" max="{{ $maximo }}" style="border:1px solid black" placeholder="Ingrese su horario disponible" required>
		                </div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
						    <tr>
						      	<th scope="col">Servicio</th>
						      	<th scope="col">Precio</th>
						      	<th scope="col">Subtotal</th>
						    </tr>
						</thead>
						<tbody>
							@php
								$total=0;
							@endphp 
							@foreach (Cart::getContent() as $value)
								@if ($value->attributes->tipo == "servicio")
									<input type="hidden" name="servicio_id[]" value="{{ $value->id }}">
									<input type="hidden" name="precio[]" value="{{ $value->price }}">
									<tr>
										<td scope="row" data-label="Producto"><img src="{{ asset('/images/servicios/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;">{{ $value->name }}</td>
										<td data-label="Precio">{{number_format($value->price, 0, '', '.') }}</td>
										<td data-label="Subtotal">{{number_format($value->price*$value->quantity, 0, '', '.') }}</td>
									</tr>
									@php
										$total+=$value->price*$value->quantity;
									@endphp
								@endif
							@endforeach
							<tr>
								<td colspan="3" style="text-align: left !important;"><b>Total:</b> <span style="float: right" id="totalapagar">{{number_format($total, 0, '', '.') }} ₲</span></td>
							</tr>
						</tbody>
					</table>
					<div class="col-12" align="center">
				        <button type="submit" class="btn btn-success"><span class="fa fa-calendar" aria-hidden="true"></span> Solicitar turno</button><br><br>
			      	</div>
		      	{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
