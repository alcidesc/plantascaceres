@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h3>Crear servicio</h3><hr>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group" align="center">
                        <label>Foto del Servicio:</label><br>
                        <img src="{{asset('/images/servicios/'.$servicio->foto)}}" alt="" class="src" width='200px'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Nombre del servicio:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{$servicio->nombre}}" name="nombre" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="informacion">Descripción del servicio</label>
                        <?= $servicio->description ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"><br>
                    <label>Precio de venta:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="text" value="{{ number_format($servicio->precio, 0, '', '.') }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6"><br>
                    <label>Precio de oferta:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="number" value="{{ number_format($servicio->oferta, 0, '', '.') }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="informacion">Categorias del producto</label><br>
                        <ul>
                            @foreach($categoriaproducto as $value)
                                <li> {{ $value->nombre }}</li>
                            @endforeach
                        </ul>
                    </div>    
                </div>
            </div>
        </div>
    </div>
@stop
