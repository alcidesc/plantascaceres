@extends('adminlte::page')

@section('title', 'Facturación')

@section('content_header')
 	<h1>Comprobante de ingreso <a href="facturacion/create"><button class="btn btn-success" id="crear"><i class="fas fa-plus-circle"></i> (N)Nuevo</button></a></h1><hr>
@stop

@section('content')
	<style>
		table {
			font-size: 12px;
			font-family: 'Times New Roman';
		}

		td,
		th,
		tr,
		table {
			border-top: 1px solid black;
			border-collapse: collapse;
		}

		td.producto,
		th.producto {
			width: 75px;
			max-width: 75px;
		}

		td.cantidad,
		th.cantidad {
			width: 40px;
			max-width: 40px;
			word-break: break-all;
		}

		td.precio,
		th.precio {
			width: 40px;
			max-width: 40px;
			word-break: break-all;
		}

		.centrado {
			text-align: center;
			align-content: center;
		}

		.ticket {
			width: 155px;
			max-width: 155px;
		}

		img {
			max-width: inherit;
			width: inherit;
		}
	</style>
	<livewire:facturacionindex />
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