<div>
    <div class="row">
        <div class="col-md-6" wire:ignore>
            <!-- BAR CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Productos mas vendidos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="vendidos" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6" wire:ignore>
            <!-- BAR CHART -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Productos mas comprados</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="comprados" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input wire:model="search" class="form-control" type="search" placeholder="Buscar producto">
        </div>
    </div><br>
    <div class="row">
        @if ($productos->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Stock</th>
                         {{-- <th>Precio venta</th>  --}}
                        <th>Precio compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->codigo }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->stock }}</td>
                            {{-- <td>{{ $producto->precio }}</td> --}}
                            <td>
                                @livewire('preciocompra', ['producto' => $producto], key($producto->id))
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
    @section('js')
        <script>
            var vendidoData = {
                labels  : <?= $mas_vendidos_nombre ?>,
                datasets: [
                    {
                        label               : 'Ingresos',
                        backgroundColor     : '#ffc107',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : <?= $mas_vendidos_cantidad ?>,
                    },
                ]
            }
            var compradoData = {
                labels  : <?= $mas_comprados_nombre ?>,
                datasets: [
                    {
                        label               : 'Ingresos',
                        backgroundColor     : '#28a745',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : <?= $mas_comprados_cantidad ?>,
                    },
                ]
            }
            //-------------
            //- Vendidos -
            //-------------
            var vendidoCanvas = $('#vendidos').get(0).getContext('2d')
            var vendidoData = $.extend(true, {}, vendidoData)
            var temp0 = vendidoData.datasets[0]
            vendidoData.datasets[0] = temp0

            var vendidoOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(vendidoCanvas, {
            type: 'bar',
            data: vendidoData,
            options: vendidoOptions
            })
            //-------------
            //- Comprados -
            //-------------
            var compradoCanvas = $('#comprados').get(0).getContext('2d')
            var compradoData = $.extend(true, {}, compradoData)
            var temp0 = compradoData.datasets[0]
            compradoData.datasets[0] = temp0

            var compradoOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(compradoCanvas, {
            type: 'bar',
            data: compradoData,
            options: compradoOptions
            })
        </script>
    @stop
</div>
