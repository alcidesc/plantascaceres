<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Carbon\Carbon;
use App\Models\Visita;
use App\Models\Producto;
use App\Models\User;
use App\Models\CabeceraPedido;

class Panelcontrol extends Component{

    public function render(){
        $vistasemana=[];
        $vistames=[];
        $vistaanho=[];
        $fechas=[];
        
        $productos=Producto::where('estado',1)->count();
        $compras=CabeceraPedido::count();
        $usuarios=User::where('nivel',3)->count();

        $dia=Carbon::now()->startOfWeek(Carbon::SUNDAY);

        for ($i=0; $i < 7; $i++) { 

            $semana=Visita::whereDate('created_at',Carbon::parse($dia)->toDateString())
                ->count();
            $vistasemana[]=$semana;

            $dia=Carbon::parse($dia)->addDay(1);
        }

        $primerdia = Carbon::now()->firstOfMonth();
        $ultimodia = Carbon::now()->lastOfMonth();

        for ($i=Carbon::parse($primerdia)->format('d'); $i <= Carbon::parse($ultimodia)->format('d'); $i++) { 
            $mes=Visita::whereDate('created_at',Carbon::parse($primerdia)->toDateString())
                ->count();
            $vistames[]=$mes;
            $fechas[]=Carbon::parse($primerdia)->format('d');

            $primerdia=Carbon::parse($primerdia)->addDay(1);
        }

        for ($i=1; $i <= 12; $i++) {
            $anho=Visita::whereYear('created_at', Carbon::now()->format('Y'))
                ->whereMonth('created_at', $i)
                ->count();
            $vistaanho[]=$anho;
        }


        return view('livewire.panelcontrol',[
            "productos"=>$productos,"compras"=>$compras,"usuarios"=>$usuarios,
            "vistasemana"=>json_encode($vistasemana,JSON_NUMERIC_CHECK),
            "vistames"=>json_encode($vistames,JSON_NUMERIC_CHECK),
            "vistaanho"=>json_encode($vistaanho,JSON_NUMERIC_CHECK),
            "fechas"=>json_encode($fechas,JSON_NUMERIC_CHECK)
        ]);
    }
}
