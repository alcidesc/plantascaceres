@extends('adminlte::page')

@section('title', 'Categorias de Gastos')

@section('content_header')
    <h1>Categorias de Gastos</h1>
@stop

@section('content')


    <livewire:cat-gastos />

@stop

@section('js')
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
    <script> console.log('Hi!'); </script>
@stop
