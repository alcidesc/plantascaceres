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
                    @if($pro->foto)
                        <div class="col-md-12" align="center">
                            <img src="{{ asset('/images/productos/'.$pro->foto) }}" style="width:200px;border-radius:20px;">
                        </div>
                    @endif
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
                    @if($pro->descripcion)
                        <div class="col-12">
                            <div class="form-group">
                                <label for="informacion">Descripción del producto</label>
                                <?= $pro->descripcion ?>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-4"><br>
                        <label>Precio de venta:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="number" value="{{$pro->precio}}" class="form-control" readonly>
                        </div>
                    </div>
                    @if($pro->precio2)
                    <div class="col-md-4"><br>
                        <label>Precio de venta 2:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="number" value="{{$pro->precio2}}" class="form-control" readonly>
                        </div>
                    </div>
                    @endif
                    @if($pro->precio3)
                    <div class="col-md-4"><br>
                        <label>Precio de venta 3:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="number" value="{{$pro->precio3}}" class="form-control" readonly>
                        </div>
                    </div>
                    @endif
                    @if($pro->oferta)
                    <div class="col-md-3"><br>
                        <label>Precio oferta:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="number" value="{{$pro->oferta}}" class="form-control" readonly>
                        </div>
                    </div>
                    @endif
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
                        <div class="form-group">
                            <label for="informacion">Seleccione Categorias</label><br>
                            <ul>
                                @foreach($listcategorias as $category)
                                    <li>{{ $category->nombre }}</li>
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