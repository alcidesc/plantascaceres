@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias de productos</h1>
@stop

@section('content')


    <livewire:categorias />

@stop

@section('js')
    <script> console.log('Hi!, {{Auth::user()->name}}'); </script>
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
@stop
