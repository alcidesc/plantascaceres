<div>
    <form action="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fecha de inicio</label>
                    <input type="date" class="form-control" wire:model="fechainicio">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fecha fin</label>
                    <input type="date" class="form-control" wire:model="fechafin">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group" wire:ignore>
                    <label for="informacion">Seleccione Categorias </label><br>
                    <select class="form-select" id="categorias_id" style="width: 100%" multiple="multiple" required>
                    	<option value="">Seleccione categorias</option>
                        @foreach($categorias as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                        @endforeach 
                    </select> 
                </div>
            </div>
            <div class="col-md-2">
                <br>
                <button type="submit" class="btn btn-success">Filtrar</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$ventaefectivo}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Venta efectivo</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$ventacredito}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Venta Crédito</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$cobrocredito}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Cobro crédito</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$ventaefectivo+$ventacredito}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Total venta</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$compraproducto}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Compra producto</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$gastosvarios}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Gastos varios</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$compraproducto+$gastosvarios}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Total gastos</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    </div>
    @section('js')
        <script>
            $('#categorias_id').select2();
            $('#categorias_id').on('change', function (e) {
                var data = $('#categorias_id').select2("val");
                @this.set('categorias_id', data);
            });
        </script>
    @stop
</div>
