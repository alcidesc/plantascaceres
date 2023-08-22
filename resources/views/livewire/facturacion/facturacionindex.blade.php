<div>
	<div class="row">
		<div class="col-md-12">
			<input wire:model="search" class="form-control" type="search" placeholder="Buscar ..."> <hr>
		</div>
	</div>
	<div class="row">
		@if ($encabezado->count())
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Cliente</th>
						<th>Tipo de venta</th>
						<th>Fecha</th>
						<th>Tipo de Comprobante</th>
						<th>Vendedor</th>
						<th>Acciones</th>

					</tr>
				</thead>
				<tbody>

					@foreach ($encabezado as $value)
						<tr>
							<td>{{ $value->id }}</td>
							<td>{{ $value->name }}</td>
							<td>
								@if($value->estado == 1)
									Contado
								@else
									Crédito
								@endif
							</td>
							<td>{{ $value->created_at }}</td>
							<td>{{ $value->tipocomprobantes }}</td>
							<td>{{ $value->vendedor }}</td>
							<td> 
								<button class="btn btn-sm btn-info" wire:click="leer({{ $value->id }})" data-toggle="modal" data-target="#exampleModalleer"><i class="fas fa-eye"></i></button>
								<button class="btn btn-sm btn-success" wire:click="leer({{ $value->id }})" onclick="printer();"><i class="fas fa-print"></i></button> 
								@if($value->estado == 0)
									<span class="badge badge-danger">Anulado</span>
								@else
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $value->id }}"><i class="far fa-trash-alt"></i></button>
								@endif

								<!-- Modal -->
								<div class="modal fade" id="exampleModal{{$value->id}}" wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Anular comprobante</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
									</div>
										<div class="modal-body">
											<p>¿Realmente quiere eliminar el comprobante?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
											<button type="button" wire:click="delete({{ $value->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
										</div>
									</div>
									</div>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="col-12">
				{{ $encabezado->links() }}
			</div>
		@else
			<div class="col-12 alert alert-warning">
				No se encuentran registros para {{ $search }}
			</div>
		@endif
	</div>
    <!-- Modal -->
   
	<div class="modal fade" wire:ignore.self id="exampleModalleer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	    		@if(isset($comprobante) && isset($productos))
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">Comprobante Nº {{ $comprobante->id }}</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
					<!-- impresion -->
		      		<div class="modal-body printableArea">
						<table class="table" >
							@if($comprobante->tipocomprobantes == "Factura") 
								<th>
									<div>
										<center>
											<h3>{{ $empresa->nombre}}</h3>
											<h5>{{ $empresa->direccion }}</h5>
											<h5>{{ $empresa->telefono1 }}</h5>
											<h6>--------------------------------</h6>
										</center>
									</div>
									<div >
										<center>
											<b>Timbrado Nro:{{ $comprobante->timbrado}}</b>
											<h5>RUC:{{ $empresa->ruc}}</h5>
											<h4>Factura Nº{{ $comprobante->codigo1}}-{{ $comprobante->codigo2}}-{{sprintf("%07d", $comprobante->nrofactura)}}</h4>
											<h6>Vigencia:{{$comprobante->iniciovigencia}}/{{$comprobante->finvigencia}}</h6>
											<h6>--------------------------------</h6>
										</center>
									</div>
								</th>
							@else
								<th>
									<div >
									<center>
										<h2>RECIBO</h2>
										<h3>{{ $empresa->nombre}}</h3>
										<h6>-{{ $empresa->telefono1 }} -{{ $empresa->telefono2 }} -{{ $empresa->direccion }}</h6>
										<h6>--------------------------------</h6>
									</center>
									</div>
								</th>
							@endif
						</table>
						<table class="table">
							<th>
								<div >
									<center>
										<b>Cliente:{{ $cliente->name }}</b>
										<h5>Fecha:{{ $comprobante->created_at }}</h5>
										<h4>Vendedor:{{ $vendedor->name }}</h4>
										<h6>--------------------------------</h6>
									</center>
								</div>
						</table>
						<hr>
		        		<div class="row">
				            <div class="col-md-12 table-responsive">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th>Producto /</th>
				                            <th>Cantidad /</th>
				                            <th>Precio /</th>
											<th>Descuento/</th>
											<th>Total/</th>
				                        </tr>
				                    </thead>
				                    <tbody>
										<?php $subtotal = 0; ?>
										@foreach ($productos as $value)
											<tr>
												<td>{{ $value->nombre }}</td>
												<td>{{ $value->cantidad }}</td>
												<td>{{ $value->precio }}</td>
												<td>{{ $value->descuento }}%</td> <!-- Mostrar el descuento -->
												<td>{{ ($value->cantidad * $value->precio) - ($value->descuento / 100) * ($value->cantidad * $value->precio) }}</td>
											</tr>
											<?php
												$subtotal += ($value->cantidad * $value->precio) - ($value->descuento / 100) * ($value->cantidad * $value->precio);
											?>
										@endforeach
									</tbody>
									
				                </table>
								<h6>--------------------------------</h6>
				            </div> 
				            <div class="col-md-9"></div>
				            <div class="col-md-3">
								@if ($comprobante->descuento)
									<?php $totalConDescuento = $subtotal - (($subtotal * $comprobante->descuento) / 100); ?>
									<p><b>Total a Cobrar: </b>{{ $totalConDescuento }}</p>
								@else
									<p><b>Total a Cobrar: </b>{{ $subtotal }}</p>
								@endif
								<p><b>&nbsp;  </b>&nbsp; </p>
								<hr>
							</div>							
				        </div>
		      		</div>
	      		@endif
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

	@if(isset($_GET['vuelto']))
		<div class="modal fade" id="exampleModalvuelto" tabindex="-1" role="dialog">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel"></h5>
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	        			</button>
		      		</div>
		      		<div class="modal-body">
		        		<h1 align="center">Vuelto:</h1>
		        		<h1 align="center"><b>{{ $_GET['vuelto'] }}</b></h1>
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        		<button type="button" wire:click="leer({{ $_GET['id'] }})" onclick="printer();" class="btn btn-success" data-dismiss="modal"><i class="fas fa-print"></i> Imprimir</button>
		      		</div>
		    	</div>
		  	</div>
		</div>
	@endif
	
</div>