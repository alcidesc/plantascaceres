<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('livewire.productos.create')
            </div>
            <div class="col-md-12">
                <input wire:model="search" class="form-control" type="search" placeholder="Buscar por código o nombre del producto">
            </div>
            <div class="col-md-12" align="right">
                <small>Filtro por {{$fila}} en orden @if($orden == "asc") ascendente @else descendente @endif</small>
            </div>
        </div>
        <div class="row table-responsive">
            @if ($productos->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="cursor:pointer" wire:click="ordenar('codigo')">Código</th>
                            <th style="cursor:pointer" wire:click="ordenar('nombre')">Producto</th>
                            <th style="cursor:pointer" wire:click="ordenar('precio')">Precio</th>
                            <th style="cursor:pointer" wire:click="ordenar('stock')">Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $pro)
                            <tr>
                                <td>{{ $pro->codigo }}</td>
                                <td>
                                    <img src="{{ asset('/images/productos/'.$pro->foto) }}" style="width:40px;border-radius:50px;">
                                    {{ $pro->nombre }}
                                </td>
                                <td>
                                    <p><b>Precio: </b>{{number_format($pro->precio, 0, '', '.') }}</p>
                                    @if($pro->oferta)
                                        <p><b>Oferta: </b>{{number_format($pro->oferta, 0, '', '.') }}</p>
                                    @endif
                                </td>
                                <td>{{ $pro->stock }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewModal{{ $pro->id }}"><i class="far fa-eye"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" wire:ignore.self id="viewModal{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $pro->nombre }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12" align="center">
                                                            <img src="{{ asset('/images/productos/'.$pro->foto) }}" style="width:200px;border-radius:20px;">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Código de barra:</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" value="{{$pro->codigo}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Nombre del producto:</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" value="{{$pro->nombre}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Enlace del producto:</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-code"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" value="{{$pro->slug}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="informacion">Descripción del producto</label>
                                                                <?= $pro->descripcion ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4"><br>
                                                            <label>Precio de venta:</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                                                </div>
                                                                <input type="number" value="{{$pro->precio}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4"><br>
                                                            <label>Precio de oferta:</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                                                </div>
                                                                <input type="number" value="{{$pro->oferta}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4"><br>
                                                            <label>Stock disponible:</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                                                </div>
                                                                <input type="number" value="{{$pro->stock}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group" wire:ignore>
                                                                <label for="informacion">Seleccione Categorias</label><br>
                                                                <ul>
                                                                    @foreach($categorias as $value)
                                                                        <li>{{ $value->nombre }}</li>
                                                                    @endforeach
                                                                </ul>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button wire:click="edit({{ $pro->id }})" class="btn btn-sm btn-info"><i class="far fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $pro->id }}"><i class="far fa-trash-alt"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" wire:ignore.self id="exampleModal{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Realmente quiere eliminar la producto {{ $pro->nombre }}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" wire:click="delete({{ $pro->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="col-12 alert alert-info">
                    No se encuentran registros para {{ $search }}
                </div>
            @endif
            <div class="col-md-12">
                {{$productos->links()}}
            </div>
        </div>
    </div>
</div>