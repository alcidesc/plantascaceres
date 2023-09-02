<div class="card card-primary {{$collapsed}}">
    <div class="card-header" wire:click="collapsed">
        <h3 class="card-title">Crear categoria de gasto</h3>
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
            <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>