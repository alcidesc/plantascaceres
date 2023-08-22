@extends('adminlte::page') 

@section('title', 'Fecha de cobro de cheques')

@section('content_header')
    <h1>Fecha de Extracciones</h1>
@stop

@section('content')


    <livewire:fecha-extraccion />
   

@stop
@section('js')
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
    <script> console.log('Hi!'); </script>
@stop
