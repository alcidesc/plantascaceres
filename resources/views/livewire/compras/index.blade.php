<div>
	<h1>Carga de Compras de Proveedor @if($updateMode == 0)<button class="btn btn-success btn-sm" wire:click="crear()"><i class="fas fa-plus-circle"></i> Crear</button>@endif </h1><hr>
    <div {{($updateMode == 0) ? 'style=display:inline' : 'style=display:none'}}>
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
							<th>Proveedor</th>
							<th>Nº de factura</th>
							<th>Fecha</th>
							<th>Recepcionado por</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($encabezado as $value)
							<tr>
								<td>{{ $value->id }}</td>
								<td>{{ $value->proveedor }}</td>
								<td>{{ $value->nfactura }}</td>
								<td>{{ $value->created_at }}</td>
								<td>{{ $value->name }}</td>
								<td>
									<button class="btn btn-sm btn-info" wire:click="leer({{ $value->id }})" data-toggle="modal" data-target="#exampleModalleer"><i class="fas fa-eye"></i></button>
									@if($value->estado == 1)
										<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $value->id }}"><i class="far fa-trash-alt"></i></button>
									@else
										<span class="badge badge-danger">Anulado</span>
									@endif

									<!-- Modal -->
									<div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Anular Compra</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p>¿Realmente quiere eliminar la compra con Nº de factura {{ $value->nfactura }}?</p>
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
	</div>
	<div {{($updateMode == 1) ? 'style=display:inline' : 'style=display:none'}}>
		<div class="row">
    		<div class="col-md-3">
    			<div class="form-group" wire:ignore>
                    <label for="informacion">Seleccione Proveedor </label><br>
                    <select class="form-select" id="proveedores" style="width: 100%" name="cliente_id" required>
                    	<option value="">Seleccione un proveedor</option>
                        @foreach($proveedores as $pro)
                            <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                        @endforeach 
                    </select> 
                </div>
				@error('proveedor_id') <span class="text-danger">{{ $message }}</span>@enderror
    		</div>
			<div class="col-md-3">
                <div class="form-group" align="center">
                    <label for="tipo_Compra">Tipo de Venta</label><br>
                    <select class="form-control" wire:model="tipoCompra" id="tipo_Compra">
                        <option value="1">Venta al Contado</option>
                        <option value="2">Venta a Crédito</option>
                    </select>
                </div>
                @error('tipoCompra')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    		<div class="col-md-3">
    			<div class="form-group">
                    <label for="informacion">Nº de factura</label><br>
                    <div class="input-group mb-3">
    				  	<input type="number" wire:model="nfactura" class="form-control" placeholder="Nº de factura">
    				</div>
					@error('nfactura') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
    		</div>
    	</div>
		<div class="row">
			<div class="col-md-3">
				<label for="TipoPago">Seleccionar Tipo de Pago:</label><br>
				<select class="form-control" id="TipoPago" wire:model="TipoPago">
					<option value="Efectivo">Efectivo</option>
					<option value="Tarjeta de Crédito">Tarjeta</option>
					<option value="Transferencia Bancaria">Transferencia</option>
					<!-- Agrega más opciones de tipos de pago según tus necesidades -->
				</select>
			</div>
			
			@if ($TipoPago === 'Transferencia Bancaria')
            <div class="col-md-4 form-group">
                <label for="banco">Seleccionar Banco:</label><br>
                <select class="form-control" id="banco" wire:model="banco">
                    <option>Seleccione una opción</option>
                    <option value="Banco ITAU">ITAU</option>
                    <option value="Banco FAMILIAR">FAMILIAR</option>
                    <option value="Banco GNB">GNB</option>
                    <option value="Banco CONTINENTAL">CONTINENTAL</option>
                    <!-- Agrega más opciones de bancos según tus necesidades -->
                </select>
            </div>
			<div class="col-md-4 form-group">
                <label for="fechaPago">Fecha de Pago:</label><br>
                <input type="date" class="form-control" id="fechaPago" wire:model="fechaPago">
            </div>
            <div class="col-md-4 form-group">
                <label for="numeroBoletas">Número de Boleta:</label><br>
                <input type="text" class="form-control" id="numeroBoletas" wire:model="numeroBoletas">
            </div>
            @endif
			@if ($TipoPago === 'Tarjeta de Crédito')
            <div class="col-md-12 form-group">
                <label for="numeroTarjeta">Número de Tarjeta:</label><br>
                <input type="text" class="form-control" id="numeroTarjeta" wire:model="numeroTarjeta">
            </div>
            @endif
            </div> 	
    	<div class="row">
    		<div class="col-md-12">
                <label for="informacion">Seleccione producto:</label><br>
                <input list="suggestionList" id="answerInput" wire:model="selectpro" class="form-control" wire:change="changeEvent">
                <datalist id="suggestionList">
                    @foreach ($productos as $value)
                        <option value="{{ $value->codigo }}">{{ $value->nombre }}</option>
                    @endforeach
                </datalist><br>
    		</div>
    	</div>
        <div class="row">
            <div class="col-md-12 table-responsive table-striped">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
						@php $total=0; @endphp
						@foreach($prod_cargados as $prod)
							<tr>
								<td>@if(isset($prod['codigo'])) {{ $prod['codigo'] }} @endif</td>
								<td>@if(isset($prod['nombre'])) {{ $prod['nombre'] }} @endif</td>
								<td>
									<input type="number" class="form-control" value="{{$prod['cantidad']}}" wire:change="changecantidad($event.target.value,{{$prod['id']}})">
								</td>
								<td>
									<input type="number" class="form-control" value="{{$prod['precio']}}" wire:change="changeprecio($event.target.value,{{$prod['id']}})">
								</td>
								<td>@if(isset($prod['cantidad']) && isset($prod['precio'])) {{ $prod['precio'] * $prod['cantidad'] }} @endif</td>
								<td><button class="btn btn-danger" wire:click="deleteitem(@if(isset($prod['id'])){{ $prod['id'] }}@else 0 @endif)"><i class="far fa-trash-alt"></i></button></td>
							</tr>
							@php $total += isset($prod['cantidad']) && isset($prod['precio']) ? ($prod['precio'] * $prod['cantidad']) : 0; @endphp
						@endforeach
                    </tbody>
                </table><hr>
            </div> 
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <p><b style="font-size: 26px;">Total: </b><span style="font-size: 26px;">{{$total}} Gs.</span></p>
                <center><button type="submit" wire:click.prevent="store()" class="btn btn-success">Guardar</button></center>
            </div>
        </div>
	</div>
	@if($updateMode == 2)
		<div class="row">
    		<div class="col-md-4">
    			<div class="form-group">
                    <label for="informacion">Proveedor </label><br>
                    <input type="text" class="form-control" value="{{$cabecera->proveedor}}" readonly>
                </div>
    		</div>
    		<div class="col-md-4">
    			<div class="form-group">
                    <label for="informacion">Nº de factura</label><br>
                    <div class="input-group mb-3">
    				  	<input type="number" class="form-control" value="{{$cabecera->nfactura}}" readonly>
    				</div>
                </div>
    		</div>
			@if (Auth::check())
				<div class="col-md-4">
					<div class="form-group">
						<label for="informacion">Recepcionado por</label><br>
						<div class="input-group mb-3">
							<input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
						</div>
					</div>
				</div>
				@endif
    		</div>
		 {{-- en esta parte es para ver las compras modal view --}}
        <div class="row">
            <div class="col-md-12 table-responsive table-striped">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
						@php $total=0; @endphp
                        @foreach($cabeceraproductos as $prod)
							<tr>
								<td>{{$prod->codigo}}</td>
								<td>{{$prod->nombre}}</td>
								<td>{{$prod->cantidad}}</td>
								<td>{{$prod->precio}}</td>
								<td>{{$prod->precio*$prod->cantidad}}</td>
							</tr>
							@php $total+=$prod->precio*$prod->cantidad; @endphp
						@endforeach
                    </tbody>
                </table><hr>
            </div> 
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <p><b style="font-size: 26px;">Total: </b><span style="font-size: 26px;">{{$total}} Gs.</span></p>
            </div>
        </div>
	@endif
	@section('js')
		<script>
			$(document).ready(function () {
				$('#proveedores').select2();
				$('#proveedores').on('change', function (e) {
					var data = $('#proveedores').select2("val");
					@this.set('proveedor_id', data);
				});
			});
		</script>
	@stop
</div>