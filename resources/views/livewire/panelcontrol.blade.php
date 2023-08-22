<div>
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$productos}}<sup style="font-size: 20px"></sup></h3>

                    <p>Productos</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$compras}}<sup style="font-size: 20px"></sup></h3>

                    <p>Pedidos realizados</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$usuarios}}<sup style="font-size: 20px"></sup></h3>

                    <p>Clientes registrados</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Vistas de la semana</h3>

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
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Vistas del mes</h3>

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
                        <canvas id="movimientomes" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Vistas del año</h3>

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
                        <canvas id="movimientoanho" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
    @section('adminlte_js')
        <script>
            var areaChartData = {
                labels  : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                datasets: [
                    {
                    label               : 'Vistas de la semana',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : <?= $vistasemana ?>,
                    },
                ]
            }
            var mesData = {
                labels  : <?= $fechas ?>,
                datasets: [
                    {
                    label               : 'Vistas del mes',
                    backgroundColor     : '#ffc107',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : <?= $vistames ?>,
                    },
                ]
            }
            var anhoData = {
                labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [
                    {
                    label               : 'Vistas del año',
                    backgroundColor     : '#28a745',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : <?= $vistaanho ?>,
                    },
                ]
            }
            //-------------
            //- Semana -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp = areaChartData.datasets[0]
            barChartData.datasets[0] = temp

            var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
            })
            //-------------
            //- Mes -
            //-------------
            var movimientomesCanvas = $('#movimientomes').get(0).getContext('2d')
            var movimientomesData = $.extend(true, {}, mesData)
            var temp = mesData.datasets[0]
            movimientomesData.datasets[0] = temp

            var movimientomesOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(movimientomesCanvas, {
            type: 'bar',
            data: movimientomesData,
            options: movimientomesOptions
            })
            //-------------
            //- Año -
            //-------------
            var movimientoanhoCanvas = $('#movimientoanho').get(0).getContext('2d')
            var movimientoanhoData = $.extend(true, {}, anhoData)
            var temp = anhoData.datasets[0]
            movimientoanhoData.datasets[0] = temp

            var movimientoanhoOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(movimientoanhoCanvas, {
            type: 'bar',
            data: movimientoanhoData,
            options: movimientoanhoOptions
            })
        </script>
    @stop
</div>
