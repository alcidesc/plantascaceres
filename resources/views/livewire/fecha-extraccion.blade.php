
<div class="container">
    <div class="container">
        <form action="{{ route('facturas-export') }}" method="POST" enctype="multipart/form-data">
             {{-- utilizamos esta ruta de facturas para filtrar --}}
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
                {{-- <div class="col-md-2">
                    <center><h6>Descargar</h6></center>
                    <center><button type="submit" class="btn btn-sm btn-success"><i class="fas fa-file-download"></i></button></center>
                </div> para descargar facturas --}}
            </div><hr>
        </form>
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="card-title">Lista de Extracciones</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Comprobante</th>
                            <th>Fecha de Extracción</th>
                            <th>Banco</th>
                            <th>Numero de Boleta</th>
                            <!-- ... otros encabezados ... -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($encabezado as $extraccion)
                            <tr>
                                <td>{{ $extraccion->id }}</td>
                                <td>{{ $extraccion->tipocomprobantes }}</td>
                                <td>{{ $extraccion->fechaCobro }}</td>
                                <td>{{ $extraccion->banco }}</td>
                                <td>{{ $extraccion->numeroBoleta }}</td>
                                <!-- ... otras columnas ... -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="mt-4">
                {{ $encabezado->links() }} <!-- Mostrar la paginación -->
            </div>
        </div>
    </div>
</div>

