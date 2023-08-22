<div class="card card-primary {{$collapsed}}">
    <div class="card-header" wire:click="collapsed">
        <h3 class="card-title">Crear categoria</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas {{$collapsedicon}}"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre de la Categoria:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese categoria" wire:model="nombre">
                @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
