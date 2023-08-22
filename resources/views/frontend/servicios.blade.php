@extends('layouts.frontend')
@section('contenido')

	@livewire('services', ['limite' => 2])
	
@stop