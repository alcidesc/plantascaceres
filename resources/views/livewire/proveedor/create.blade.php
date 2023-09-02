@if($updateMode)
    <div class="card card-warning {{$collapsed}}">
        <div class="card-header" wire:click="collapsed">
            <h3 class="card-title">Editar Proveedor</h3>
@else
    <div class="card card-primary {{$collapsed}}">
        <div class="card-header" wire:click="collapsed">
            <h3 class="card-title">Crear Proveedor</h3>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre del Proveedor:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre del proveedor" wire:model="nombre">
                        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ruc del Proveedor:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese ruc del proveedor" wire:model="ruc">
                        @error('ruc') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contacto del Proveedor:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese contacto del proveedor" wire:model="contacto">
                        @error('contacto') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="exampleFormControlInput1">Dirección del Proveedor:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese dirección del proveedor" wire:model="direccion">
                    @error('direccion') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-12"><br>
                    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>