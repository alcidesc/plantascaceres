<div>
	<div class="product-easy">
		<div class="container">
			<div class="sap_tabs" align="center">
				<div class="new_arrivals" style="margin-top: -100px;">
					<div class="container"><br>
						<h3 style="color:#eb646b;">Tus <span>Pedidos</span></h3>
						<p>{{ Auth::user()->name }},estos son tus pedidos.</p><br>	
					</div>
				</div>		  	 
				<div class="row">
				    @if ($cabecera->count())
					    <table class="table">
					        <thead>
					            <tr>
					                <th>Fecha de Compra</th>
					                <th>Tipo de entrega</th>
					                <th>Estado</th>
					            </tr>
					        </thead>
					        <tbody>
					            @foreach ($cabecera as $value)
					                <tr>
					                	<td data-label="Fecha de Compra"><button class="btn btn-success" wire:click="leer({{ $value->id }})" data-toggle="modal" data-target="#exampleModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></button> {{ $value->created_at }}</td>
					                	<td data-label="Tipo de entrega">
					                		@if ($value->tipoentrega == 1)
					                			Entrega en tienda
					                		@else
					                			Delivery
					                		@endif
					                	</td>
					                	<td data-label="Estado">
					                		@if ($value->estado == 0)
					                			<span class="badge badge-pill badge-danger">Solicitud realizada</span>
					                		@elseif($value->estado == 1)
					                			<span class="badge badge-pill badge-warning">En proceso</span>
					                		@elseif($value->estado == 2)
					                			<span class="badge badge-pill badge-success">Entregado</span>
					                		@endif
					                	</td>
					                </tr>
					            @endforeach
					        </tbody>
					    </table>
				    @endif
				    <!-- Modal -->
					<div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  	<div class="modal-dialog" role="document">
					    	<div class="modal-content">
					     		<div class="modal-header">
					        		<h3 class="modal-title" id="exampleModalLabel" style="color:#eb646b;">Productos <span>comprados</span>
					        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          				<span aria-hidden="true">&times;</span>
					        			</button>
					        		</h3>
					      		</div>
					      		<div class="modal-body">

					      			<table class="table">
								        <thead>
								            <tr>
								                <th>Producto</th>
								                <th>Cantidad</th>
								                <th>Precio</th>
								            </tr>
								        </thead>
								        <tbody>
								        	@if(isset($productos))
									        	@php
									        		$total=0;
									        	@endphp
									            @foreach ($productos as $element)
									                <tr>
									                	<td data-label="Producto">{{ $element->nombre }}</td>
									                	<td data-label="Cantidad">{{ $element->cantidad }}</td>
									                	<td data-label="Precio">{{number_format($element->precio, 0, '', '.') }}</td>
									                </tr>
									                @php
									                	$total+=$element->precio*$element->cantidad;
									                @endphp
									            @endforeach
									            <tr>
									            	<td colspan="3" data-label="Total"><b>{{number_format($total, 0, '', '.') }}</b></td>
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
	@if(session('mensaje'))
		<div class="modal fade" wire:ignore.self id="whatsappModal" tabindex="-1" role="dialog" aria-labelledby="whatsappModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="whatsappModalLabel">¡Pedido Enviado Correctamente!</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" align="center">
						<h5>¿Deseas enviar un whatsapp al proveedor?</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<a href="{{ session('mensaje') }}"><button type="button" class="btn btn-warning">Enviar Whatsapp</button></a>
					</div>
				</div>
			</div>
		</div>
		<script>
			$('#whatsappModal').modal('show');
		</script>
	@endif
</div>

