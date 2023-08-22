<hr>
<form>
    <div class="form-group">
         <label for="exampleFormControlInput1">Nombre de la Compra:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre" wire:model="nombre">
        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput1">Costo:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese costo del gasto" wire:model="costo">
        @error('costo') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
</form>
<hr>