<div>
    <script>
    	$(".mensajes p span").text('{{ $contador ?? '' }}');
    	$(".servicios p span").text('{{ $contadorservicios ?? '' }}');
    	$(".productos p span").text('{{ $contadorproductos ?? '' }}');
		$(".mensajesservicios p span").text('{{ $contadorserviciosolicitud ?? '' }}');
	    $(".mensajesproductos p span").text('{{ $contadorproductosolicitud ?? '' }}');
    </script>
</div>
