<hr>
<form>
<div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre de la Categoria:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese categoria" wire:model="nombre">
                @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Observación de la Categoria:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese alguna observación" wire:model="observacion">
                @error('observacion') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
</form>
<hr>