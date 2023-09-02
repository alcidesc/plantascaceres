<div>
    <div class="row">
        <div class="col-md-12">
            <h3><b>Categoria: </b> {{$categoriaGasto->nombre}}</h3>
        </div>
        <div class="col-md-12"> 
            @if($updateMode)
                @include('livewire.gastos.update')
            @else
                @include('livewire.gastos.create')
            @endif
        </div>
        <div class="col-md-12">
            <input wire:model="search" class="form-control" type="search" placeholder="Buscar Gasto">
        </div>
    </div>
  
    <br>
    <div class="row">
        @if ($costos->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gasto</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $total=0;
                    @endphp
                    @foreach ($costos as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->nombre }}</td>
                            <td>{{number_format($cat->costo, 0, '', '.') }}</td>
                            <td>{{ $cat->created_at }}</td>
                            <td>
                            
                            <button wire:click="edit({{ $cat->id }})" class="btn btn-sm btn-info">Editar</button>
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
                        @php
                            $total+=$cat->costo;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="2"><b>Total</b></td>
                        <td colspan="3">{{number_format($total, 0, '', '.') }} Gs.</td>
                    </tr>
                </tbody>
            </table>
        @else
            <div class="col-12 alert alert-warning">
                No se encuentran registros para {{ $search }}
            </div>
        @endif
    </div>
</div>