<div>
    <div class="row">
        <div class="col-md-12"> 
            @if($updateMode)
                @include('livewire.proveedor.update')
            @else
                @include('livewire.proveedor.create')
            @endif
        </div>
        <div class="col-md-12">
              <input wire:model="search" class="form-control" type="search" placeholder="Buscar proveedor">
        </div>
    </div>
    <br>
    <div class="row">
        @if ($proveedores->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Proveedores</th>
                        <th>RUC</th>
                        <th>Contacto</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $prov)
                        <tr>
                            <td>{{ $prov->nombre }}</td>
                            <td>{{ $prov->ruc }}</td>
                            <td><a href="tel:{{ $prov->contacto }}">{{ $prov->contacto }}</a></td>
                            <td>{{ $prov->direccion }}</td>
                            <td>
                                <button wire:click="edit({{ $prov->id }})" class="btn btn-sm btn-info">Editar</button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $prov->id }}"><i class="far fa-trash-alt"></i></button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$prov->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Proveedor</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <div class="modal-body">
                                            <p>¿Realmente quiere eliminar el proveedor {{ $prov->nombre }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" wire:click="delete({{ $prov->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="col-12 alert alert-warning">
                No se encuentran registros para {{ $search }}
            </div>
        @endif
    </div>
</div>