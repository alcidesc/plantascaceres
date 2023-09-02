@if($updateMode)
    <div class="card card-warning {{$collapsed}}">
        <div class="card-header" wire:click="collapsed">
            <h3 class="card-title">Editar producto</h3>
@else
    <div class="card card-primary {{$collapsed}}">
        <div class="card-header" wire:click="collapsed">
            <h3 class="card-title">Crear producto</h3>
@endif
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas {{$collapsedicon}}"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" align="center">
                        <label>Foto del producto:</label><br>
                        @if($updateMode)
                            @if($fotoupdate) 
                                <img src="{{ $fotoupdate->temporaryUrl() }}" width="200px;">
                            @else
                                <img src="{{ asset('/images/productos/'.$foto) }}" width="200px;">
                            @endif
                            <input type="file" class="form-control" wire:model="fotoupdate" accept="image/jpeg, image/png, image/bmp">
                        @else
                            @if($foto) 
                                <img src="{{ $foto->temporaryUrl() }}" width="200px;">
                            @else
                                <img src="{{ asset('imgsystem/producto.png') }}" width="200px;">
                            @endif
                            <input type="file" class="form-control" wire:model="foto" accept="image/jpeg, image/png, image/bmp">
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Código de barra:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control @error('codigo') is-invalid @enderror" wire:model="codigo" placeholder="Código de barra" required>
                        @error('codigo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Nombre del producto:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                        </div>
                        <input type="text" id="nombre" class="form-control @error('nombre') is-invalid @enderror" wire:model="nombre" placeholder="Nombre del producto" required>
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Enlace del producto:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                        </div>
                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" wire:model="slug" placeholder="Enlace del producto">
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group" wire:ignore>
                        <label for="informacion">Descripción del producto</label>
                        <textarea id="descripcion" class="textarea form-control"  required></textarea>
                    </div>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4"><br>
                    <label>Precio de venta:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="text" wire:ignore id="precio" class="number form-control @error('precio') is-invalid @enderror" placeholder="Precio de venta" step="any" required>
                        @error('precio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4"><br>
                    <label>Precio de venta 2:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="text" wire:ignore id="precio2" class="number form-control @error('precio2') is-invalid @enderror" placeholder="Precio de venta" required>
                        @error('precio2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4"><br>
                    <label>Precio de venta 3:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="text" wire:ignore id="precio3" class="number form-control @error('precio3') is-invalid @enderror" placeholder="Precio de venta" required>
                        @error('precio3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4"><br>
                    <label>Precio de oferta:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="text" wire:ignore id="oferta" class="number form-control @error('oferta') is-invalid @enderror" placeholder="Precio de oferta" >
                        @error('oferta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4"><br>
                    <label>Stock disponible:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                        </div>
                        <input type="number" wire:ignore id="stock" class="number form-control @error('stock') is-invalid @enderror" placeholder="Stock disponible" min="1" required>
                        @error('stock')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4"><br>
                    <label>Seleccionar IVA:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-percent"></i></span>
                        </div>
                        <select name="iva" class="form-control @error('iva') is-invalid @enderror">
                            <option selected>Seleccione una opción</option>
                            <option value="10" selected>10%</option>
                            <option value="5">5%</option>
                        </select>
                        @error('iva')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group" wire:ignore>
                        <label for="informacion">Seleccione Categorias</label><br>
                        <select id="categorias_id" style="width: 100%" class="form-select" multiple="multiple" required>
                            @foreach($categorias as $value)
                                <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>  
                    </div>
                    @error('categorias_id')
                        <strong style="color:red">Seleccione una categoria</strong>
                    @enderror
                </div>
            </div>
            @if($updateMode)
                <button wire:click.prevent="update()" class="btn btn-warning">Actualizar</button>
                <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
            @else
                <button wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
            @endif
        </form>
    </div>
</div>

