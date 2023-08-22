@extends('adminlte::page') 

@section('title', 'Fecha de cobro de cheques')

@section('content_header')
    <h1>Fecha de Depositos</h1>
@stop

@section('content')


    <livewire:fecha-deposito />

@stop
@section('js')
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
    <script> console.log('Hi!'); </script>
@stop