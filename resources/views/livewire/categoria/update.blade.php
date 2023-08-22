<div class="card card-warning {{$collapsed}}">
    <div class="card-header" wire:click="collapsed">
        <h3 class="card-title">Editar categoria</h3>
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
            <button wire:click.prevent="update()" class="btn btn-warning">Actualizar</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
        </form>
    </div>
</div>