@extends('adminlte::page')

@section('title', 'Carga de compras de proveedor')

@section('content_header')
    
@stop

@section('content')


    @livewire('compras')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
@stop
