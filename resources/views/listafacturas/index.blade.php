@extends('adminlte::page')

@section('title', 'Facturación')

@section('content_header')
 	<h1>Facturas</h1>
@stop

@section('content')
	<livewire:listafacturas/>
@stop

@section('js')
	<script>

		$(document).keypress(function(e){
			if(e.charCode == 78){ 
				$('#crear').click();
			}
		});

		let identificadorTiempoDeEspera;

	    function printer() {
		  identificadorTiempoDeEspera = setTimeout(funcionConRetraso, 1000);
		}

		function funcionConRetraso() {
		  	var mode = 'iframe'; //popup
	        var close = mode == "popup";
	        var options = { mode : mode, popClose : close};
	        $("div.printableArea").printArea( options );
		}
	</script>
	@if(isset($_GET['vuelto']))
		<script> $('#exampleModalvuelto').modal('show'); </script>
	@endif
@stop