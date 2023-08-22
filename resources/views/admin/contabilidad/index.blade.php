@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
    <h1>Contabilidad</h1><hr>
@stop

@section('content')


    @livewire('contabilidad')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
@stop