<div class="card card-primary {{$collapsed}}">
    <div class="card-header" wire:click="collapsed">
        <h3 class="card-title">Editar gasto</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas {{$collapsedicon}}"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre del Gasto:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre" wire:model="nombre">
                        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Costo del Gasto:</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese costo del gasto" wire:model="costo">
                        @error('costo') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
        </form>
    </div>
</div>