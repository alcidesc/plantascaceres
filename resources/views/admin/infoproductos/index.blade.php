@extends('adminlte::page')

@section('title', 'Informe productos')

@section('content_header')
    <h1>Informe productos</h1><hr>
@stop

@section('content')


    <livewire:infoproductos />

@stop

@section('js')
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
    <script> console.log('Hi!'); </script>
@stop