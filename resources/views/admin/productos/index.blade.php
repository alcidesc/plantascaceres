@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')


    <livewire:productos />

@stop

@section('js')
    <script> console.log('Hi!, {{Auth::user()->name}}'); </script>
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
@stop
