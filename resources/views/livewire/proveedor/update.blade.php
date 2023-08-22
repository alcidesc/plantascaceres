<hr>
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
            <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
        </div>
    </div>
</form>
<hr>