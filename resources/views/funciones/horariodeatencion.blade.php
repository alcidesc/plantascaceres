<?php
	function calcularhorario($empresa){
		if (date("N") == 1){
			if (time() > $empresa->lunesingreso && time() < $empresa->lunessalida){
				return "si";
			}else{
				return "no";
			}
		}elseif (date("N") == 2){
			if (date('H:i:s') > $empresa->martesingreso && date('H:i:s') < $empresa->martessalida){
				return "si";
			}else{
				return "no";
			}
		}elseif (date("N") == 3){
			if (time() > $empresa->miercoesingreso && time() < $empresa->miercoessalida){
				return "si";
			}else{
				return "no";
			}
		}elseif (date("N") == 4){
			if (time() > $empresa->juevesingreso && time() < $empresa->juevessalida){
				return "si";
			}else{
				return "no";
			}
		}elseif (date("N") == 5){
			if (time() > $empresa->viernesingreso && time() < $empresa->viernessalida){
				return "si";
			}else{
				return "no";
			}
		}elseif (date("N") == 6){
			if (time() > $empresa->sabadoingreso && time() < $empresa->sabadosalida){
				return "si";
			}else{
				return "no";
			}
		}elseif (date("N") == 7){
			if (time() > $empresa->domingoingreso && time() < $empresa->domingosalida){
				return "si";
			}else{
				return "no";
			}
		}
	}
?>