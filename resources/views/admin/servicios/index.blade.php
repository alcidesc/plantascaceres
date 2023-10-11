@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Servicios <a href="servicios/create"><button class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear Servicio</button></a></h1><hr>
@stop

@section('content')

    <livewire:servicios />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop