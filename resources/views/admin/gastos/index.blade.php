@extends('adminlte::page')

@section('title', 'Carga de Gastos')

@section('content_header')
    <h1>Carga de Gastos</h1>
@stop

@section('content')

    @livewire('add-gasto', ['categoria_id' => $categoriaGastoId])

@stop

@section('js')
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
    <script> console.log('Hi!'); </script>
@stop
