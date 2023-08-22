@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Recepción de pedido de productos</h1>
@stop

@section('content')

<livewire:productorecepcion />

@stop

@section('js')
    <script> 
    	console.log('Hi!'); 
		
	</script>
@stop
