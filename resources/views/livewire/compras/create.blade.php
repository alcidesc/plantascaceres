<hr>
<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre del Gasto:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre" wire:model="nombre">
        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput1">Costo del Gasto:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese costo del gasto" wire:model="costo">
        @error('costo') <span class="text-danger">{{ $message }}</span>@enderror
        
    </div>
   
    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
</form>
<hr>