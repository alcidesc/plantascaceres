@extends('adminlte::page')

@section('title', 'Mensajes')

@section('content_header')
    <h1>Mensajes</h1>
@stop

@section('content')

<livewire:correos />
 
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
