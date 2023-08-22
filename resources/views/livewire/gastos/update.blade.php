<hr>
<form>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del Gasto:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre" wire:model="nombre">
                @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Costo del Gasto:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese costo del gasto" wire:model="costo">
                    @error('costo') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
</form>
<hr>