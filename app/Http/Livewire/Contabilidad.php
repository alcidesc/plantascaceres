<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use DB;
use Carbon\Carbon;
use App\Models\Credito;

class Contabilidad extends Component{

    public $ventaefectivo=0,$ventacredito=0,$cobrocredito=0,$compraproducto=0,$gastosvarios=0;

    public $fechainicio,$fechafin,$categorias_id=[];

    public function render(){

        $categorias=Categoria::where('estado',1)->get();

        if($this->fechainicio && $this->fechafin && $this->categorias_id){

            $this->ventaefectivo=DB::table('facturacionproductos as fp')
                ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
                ->join('productos as p','fp.producto_id','p.id')
                ->join('categoria_productos as cp','cp.producto_id','p.id')
                ->where('fe.estado',1)
                ->whereDate('fe.created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
                ->whereDate('fe.created_at','<=',Carbon::parse($this->fechafin)->toDateString())
                ->whereIn('cp.categoria_id', $this->categorias_id)
                ->sum(\DB::raw('fp.precio * fp.cantidad'));

            $this->ventacredito=DB::table('facturacionproductos as fp')
                ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
                ->join('productos as p','fp.producto_id','p.id')
                ->join('categoria_productos as cp','cp.producto_id','p.id')
                ->where('fe.estado',2)
                ->whereDate('fe.created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
                ->whereDate('fe.created_at','<=',Carbon::parse($this->fechafin)->toDateString())
                ->whereIn('cp.categoria_id', $this->categorias_id)
                ->sum(\DB::raw('fp.precio * fp.cantidad'));

            $this->cobrocredito=0;

            $this->compraproducto=DB::table('compraproductos as cp')
                ->join('cabeceracompras as cc','cp.cabecera_id','cc.id')
                ->join('productos as p','cp.producto_id','p.id')
                ->join('categoria_productos as cps','cps.producto_id','p.id')
                ->where('cc.estado',1)
                ->whereDate('cp.created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
                ->whereDate('cp.created_at','<=',Carbon::parse($this->fechafin)->toDateString())
                ->whereIn('cps.categoria_id', $this->categorias_id)
                ->sum(\DB::raw('cp.precio * cp.cantidad'));

            $this->gastosvarios=0;

        }else if($this->fechainicio && $this->fechafin){

            $this->ventaefectivo=DB::table('facturacionproductos as fp')
                ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
                ->where('fe.estado',1)
                ->whereDate('fe.created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
                ->whereDate('fe.created_at','<=',Carbon::parse($this->fechafin)->toDateString())
                ->sum(\DB::raw('fp.precio * fp.cantidad'));

            $this->ventacredito=DB::table('facturacionproductos as fp')
                ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
                ->where('fe.estado',2)
                ->whereDate('fe.created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
                ->whereDate('fe.created_at','<=',Carbon::parse($this->fechafin)->toDateString())
                ->sum(\DB::raw('fp.precio * fp.cantidad'));

            $this->cobrocredito=Credito::where('estado',1)
                ->whereDate('created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
                ->whereDate('created_at','<=',Carbon::parse($this->fechafin)->toDateString())
                ->sum('monto');

            $this->compraproducto=DB::table('compraproductos as cp')
                ->join('cabeceracompras as cc','cp.cabecera_id','cc.id')
                ->where('cc.estado',1)
                ->whereDate('cp.created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
                ->whereDate('cp.created_at','<=',Carbon::parse($this->fechafin)->toDateString())
                ->sum(\DB::raw('cp.precio * cp.cantidad'));

            $this->gastosvarios=DB::table('gastos as g')
                ->join('categoria_gastos as cg','g.gastocategoria_id','cg.id')
                ->where('cg.estado',1)
                ->whereDate('g.created_at','>=',Carbon::parse($this->fechainicio)->toDateString())
                ->whereDate('g.created_at','<=',Carbon::parse($this->fechafin)->toDateString())
                ->sum('g.costo');

        }else{
            $this->ventaefectivo=0;
            $this->ventacredito=0;
            $this->cobrocredito=0;
            $this->compraproducto=0;
            $this->gastosvarios=0;
        }

        return view('livewire.contabilidad',["categorias"=>$categorias]);
    }
}
