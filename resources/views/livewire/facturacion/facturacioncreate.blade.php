<div>
    <form wire:submit.prevent="facturacion">
    	<div class="row">
    		<div class="col-md-4">
    			<div class="form-group" wire:ignore>
                    <label for="informacion">(S)Seleccione Cliente </label><span style="cursor: pointer;" class="badge badge-success" data-toggle="modal" id="crearcliente" data-target="#exampleModalCenter" require> (C)Crear cliente</span><br>
                    <select class="form-select" id="cliente_id" style="width: 100%" required>
                    	<option value="">Seleccione un cliente</option>
                        @foreach($clientes as $value)
                            <option value="{{ $value->id }}">{{ $value->name }} <b>C.I.:</b> {{ $value->ci }}</option>
                        @endforeach 
                    </select> 
                    @error('cliente_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    		</div>
            <div class="col-md-2">
                <div class="form-group" align="center">
                    <label for="tipo_venta">Tipo de Venta</label><br>
                    <select class="form-control" wire:model="tipoVenta" id="tipo_venta">
                        <option value="1">Venta al Contado</option>
                        <option value="2">Venta a Crédito</option>
                    </select>
                </div>
                @error('tipoVenta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-md-2">
                <label for="tipoPago">Seleccionar Tipo de Pago:</label><br>
                <select class="form-control" id="tipoPago" wire:model="tipoPago">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta de Crédito">Tarjeta</option>
                    <option value="Transferencia Bancaria">Cheque</option>
                    <!-- Agrega más opciones de tipos de pago según tus necesidades -->
                </select>
            </div>
            @if ($tipoPago === 'Transferencia Bancaria')
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
                <label for="fechaCobro">Fecha de Cobro:</label><br>
                <input type="date" class="form-control" id="fechaCobro" wire:model="fechaCobro">
            </div>
            <div class="col-md-4 form-group">
                <label for="numeroBoleta">Número de Boleta:</label><br>
                <input type="text" class="form-control" id="numeroBoleta" wire:model="numeroBoleta">
            </div>
            @endif
            <div class="col-md-2 form-group">
                <label for="precioSeleccionado">Seleccionar Precio:</label><br>
                <select class="form-control" id="precioSeleccionado" wire:model="precioSeleccionado">
                    <option value="precio">Precio 1</option>
                    <option value="precio2">Precio 2</option>
                    <option value="precio3">Precio 3</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="productos">tipo de Comprobante:</label><br>
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01" wire:model="tipocomprobantes" required>
                        <option value="">Seleccione el Comprobante</option>
                        <option value="Recibo">Recibo</option>
                        <option value="Factura">Factura</option>
                    </select>
                    @error('tipocomprobantes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            @if ($tipoPago === 'Tarjeta de Crédito')
            <div class="col-md-12 form-group">
                <label for="numeroTarjeta">Número de Tarjeta:</label><br>
                <input type="text" class="form-control" id="numeroTarjeta" wire:model="numeroTarjeta">
            </div>
            @endif
            </div>  
        @if($tipocomprobantes == "Factura")
            <div class="row">
                <div class="col-md-2">
                    <label for="productos">Codigo 1:</label><br>
                    <div class="input-group mb-3">
                        <input type="text"  wire:model="codigo1" class="form-control"  readonly >
                        @error('codigo_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="productos">Codigo 2:</label><br>
                    <div class="input-group mb-3">
                        <input type="text"  wire:model="codigo2" class="form-control"  readonly >
                        @error('codigo_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="productos">Nro de Factura:</label><br>
                    <div class="input-group mb-3">
                        <input type="number"  wire:model="nrofactura" class="form-control"  readonly >
                        @error('nrofactura')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="productos">Timbrado:</label><br>
                    <div class="input-group mb-3">
                        <input type="number"  wire:model="timbrado" class="form-control"  readonly >
                        @error('timbrado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> 
                </div>
                <div class="col-md-2">
                    <label for="productos">Inicio de Vigencia:</label><br>
                    <div class="input-group mb-3">
                        <input type="date"  wire:model="iniciovigencia" class="form-control"  readonly>
                        @error('iniciovigencia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="productos">Fin de Vigencia:</label><br>
                    <div class="input-group mb-3">
                        <input type="date"  wire:model="finvigencia" class="form-control"  readonly>
                        @error('finvigencia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    	<div class="row">
            <div class="col-md-12">
                <label for="productos">(P)Seleccione producto:</label><br>
                <input list="suggestionList" id="productos" wire:model="selectpro" class="form-control" wire:change="changeEvent">
                <datalist id="suggestionList">
                    @foreach ($productos as $value)
                        <option value="{{ $value->codigo }}">{{ $value->nombre }}</option>
                    @endforeach
                </datalist>
                
                @error('selectpro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('prod_cargados')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
                            <th>Descuento</th>
                            <th>Subtotal</th> 
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $subtotal = 0; @endphp
                        @foreach($prod_cargados as $prod)
                            <tr>
                                <td>{{$prod['codigo']}}</td>
                                <td>{{$prod['nombre']}}</td>
                                <td>
                                    <input type="number" class="form-control" value="{{$prod['cantidad']}}" wire:change="changecantidad($event.target.value,{{$prod['id']}})">
                                </td>
                                <td>
                                    @if($prod['nombre'] == "varios")
                                        <input type="number" class="form-control" value="{{$prod['precio']}}" wire:change="changeprecio($event.target.value,{{$prod['id']}})">
                                    @else
                                        {{$prod['precio']}}
                                    @endif
                                </td>
                                <td>
                                    <input type="number" class="form-control" value="{{$prod['descuento']}}" wire:change="changedescuento($event.target.value,{{$prod['id']}})">
                                </td>
                                <td>
                                    {{$prod['precio'] * $prod['cantidad'] - ($prod['descuento'] / 100) * ($prod['precio'] * $prod['cantidad'])}}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" wire:click="deleteitem({{$prod['id']}})">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @php
                                $subtotal += ($prod['precio'] * $prod['cantidad']) - ($prod['descuento'] / 100) * ($prod['precio'] * $prod['cantidad']);
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <hr>
            </div> 
            <div class="col-md-6"></div>
            <div class="col-md-6">
                {{-- <p><b style="font-size: 26px;">SubTotal: </b><span id="subtotal" style="font-size: 26px;">{{$subtotal}}</span></p> --}}
                {{-- <p><b style="font-size: 26px;">Descuento: </b><span id="descuento" style="font-size: 26px;">{{ $descuento }}</span></p> --}}
                <p><b style="font-size: 26px;">Total: </b><span id="total" style="font-size: 26px;">{{$subtotal - $descuento}}</span></p>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">(F)Efectivo</span>
                    <div class="input-group-append">
                        <input type="number" min="50" class="form-control" wire:model="efectivo" id="efectivo" placeholder="Ingrese efectivo" required>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        

    <div class="modal fade" wire:init="openModal" wire:ignore.self id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Crear Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre y Apellido</label>
                                    <input type="text" class="form-control" wire:model="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre y Apellido">
                                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">RUC/CI</label>
                                    <input type="text" class="form-control" wire:model="ci" id="exampleInputPassword1" placeholder="RUC/CI">
                                    @error('ci') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> 
                        </div>  
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    @section('adminlte_js')
        <script>
            $('#cliente_id').select2();
            $( "#cliente_id").select2('open');
            $(document).keypress(function(e){
                console.log(e.charCode);
                if(e.charCode == 83){ 
                    $( "#cliente_id").select2('open');
                }else if(e.charCode == 67){
                    $('#crearcliente').click();
                }else if(e.charCode == 86){
                    $('#credito').click();
                }else if(e.charCode == 68){
                    $('#descuento').focus();
                }else if(e.charCode == 80){
                    $('#productos').focus();
                    setTimeout(function() {
                        $("#productos").val('');
                    }, 5);
                }else if(e.charCode == 70){
                    $('#efectivo').focus();
                }
            });

            $('#cliente_id').on('change', function (e) {
                var data = $('#cliente_id').select2("val");
                @this.set('cliente_id', data);
            });

            Livewire.on('usuario', postId => {
                var o = $("<option/>", {value: postId["id"], text: postId["name"]});
                $('#cliente_id').append(o);
                $('#cliente_id option[value="' + postId["id"] + '"]').prop('selected',true);
                $('#cliente_id').trigger('change');
                $('#exampleModalCenter').modal('hide');
            });
        </script>
    @stop
</div>