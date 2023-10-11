<div>
	<div class="about">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Tus <span>Servicios</span></h3>
			</div>
			<div class="ab-agile">
				<div class="col-md-12 aboutleft" align="center">
					<h3 style="color: #525252;">Estas son tus citas solicitadas {{ Auth::user()->name }} </h3>
					<p class="para1"></p>
				</div>	
				<div class="clearfix"></div>
				<div class="clearfix"></div>
				<div class="row">
				    @if ($cabecera->count())
					    <table class="table">
					        <thead>
					            <tr>
					                <th>Fecha de cita</th>
					                <th>Estado</th>
					            </tr>
					        </thead>
					        <tbody>
					            @foreach ($cabecera as $value)
					                <tr>
					                	<td data-label="Fecha de cita"><button class="btn btn-success" wire:click="leer({{ $value->id }})" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></button> {{ $value->cita_dia }} {{ $value->cita_hora }}</td>
					                	<td data-label="Estado">
					                		@if ($value->estado == 0)
					                			<span class="badge badge-pill badge-danger">Solicitud realizada</span>
					                		@elseif($value->estado == 1)
					                			<span class="badge badge-pill badge-warning">Cita confirmada</span>
					                		@elseif($value->estado == 2)
					                			<span class="badge badge-pill badge-success">Servicios realizados</span>
					                		@endif
					                	</td>
					                </tr>
					            @endforeach
					        </tbody>
					    </table>
				    @endif
				    <!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  	<div class="modal-dialog" role="document">
					    	<div class="modal-content">
					     		<div class="modal-header">
					        		<h5 class="modal-title" id="exampleModalLabel">Servicios solicitados
					        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          				<span aria-hidden="true">&times;</span>
					        			</button>
					        		</h5>
					      		</div>
					      		<div class="modal-body">

					      			<table class="table">
								        <thead>
								            <tr>
								                <th>Servicio</th>
								                <th>Precio</th>
								            </tr>
								        </thead>
								        <tbody>
								        	@if(isset($servicios))
									        	@php
									        		$total=0;
									        	@endphp
									            @foreach ($servicios as $element)
									                <tr>
									                	<td data-label="Producto">{{ $element->nombre }}</td>
									                	<td data-label="Precio">{{number_format($element->precio, 0, '', '.') }}</td>
									                </tr>
									                @php
									                	$total+=$element->precio;
									                @endphp
									            @endforeach
									            <tr>
									            	<td colspan="2" data-label="Total"><b>{{number_format($total, 0, '', '.') }}</b></td>
									            </tr>
						        			@endif
								        </tbody>
								    </table>
					      		</div>
					      		<div class="modal-footer">
					        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					      		</div>
					    	</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 

