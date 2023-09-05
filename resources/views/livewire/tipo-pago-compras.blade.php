<div class="container">
    <form action="{{ route('facturas-export') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <h6>Fecha De Creacion</h6>
                <input wire:model="fechainicio" name="fechainicio" class="form-control" type="date">
            </div>
            <div class="col-md-5">
                <h6>Fecha Limite</h6>
                <input wire:model="fechafin" name="fechafin" class="form-control" type="date">
            </div>
        </div>
        <hr>
    </form>
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="card-title">Fecha De Pagos</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Proveedor</th>
                            {{-- <th>Tipo de Comprobante</th> --}}
                            <th>Fecha de Pago</th>
                            <th>Banco</th>
                            <th>Numero de Factura</th>
                            <!-- ... otros encabezados ... -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cabecera as $cab)
                            <tr>
                                <td>{{ $cab->id }}</td>
                                <td>{{ $cab->proveedor->nombre }}</td>
                                {{-- <td>{{ $cab->TipoPago }}</td> --}}
                                <td>{{ $cab->fechaPago }}</td>
                                <td>{{ $cab->banco }}</td>
                                <td>{{ $cab->nfactura }}</td>
                                <!-- ... otras columnas ... -->
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="mt-4">
                {{ $cabecera->links() }} <!-- Mostrar la paginación -->
            </div>
        </div>
    </div>
</div>
