@extends('layouts.frontend')
@section('contenido')

	@livewire('view', ['slug' => $slug])

@stop