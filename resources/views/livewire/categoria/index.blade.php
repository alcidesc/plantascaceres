<div>
    <div class="row">
        <div class="col-md-12"> 
            @if($updateMode)
                @include('livewire.categoria.update')
            @else
                @include('livewire.categoria.create')
            @endif
        </div>
        <div class="col-md-12">
            <input wire:model="search" class="form-control" type="search" placeholder="Buscar categoria">
        </div>
    </div><br>
    <div class="row table-responsive">
        @if ($categorias->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->nombre }}</td>
                            <td>
                            <button wire:click="edit({{ $cat->id }})" class="btn btn-sm btn-info"><i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $cat->id }}"><i class="far fa-trash-alt"></i></button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Realmente quiere eliminar la categoria {{ $cat->nombre }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" wire:click="delete({{ $cat->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="col-12 alert alert-info">
                No se encuentran registros para {{ $search }}
            </div>
        @endif
        <div class="col-md-12">
            {{$categorias->links()}}
        </div>
    </div>
</div>