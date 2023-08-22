<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Facturacionencabezado;
use App\Models\Facturacionproducto;
use App\Models\Producto;
use App\Models\User;
use App\Models\Empresa;
use Carbon\Carbon;
use DB;

class PDFController extends Controller{

    public $comprobante,$productos,$vendedor,$cliente,$fechainicio,$fechafin;

    public function facturasexport(Request $request){ //Para generar el pdf 
        
        $empresa=Empresa::findOrFail(1);  

        if ($request->fechainicio && $request->fechafin) {
            $encabezado = DB::table('facturacionencabezados as f')
            ->join('users as u','f.cliente_id','u.id')
            ->join('users as us','f.vendedor_id','us.id')
            ->select('f.*','u.name','us.name as vendedor')
            ->where('f.estado',1)
            ->whereDate('f.created_at','>=',Carbon::parse($request->fechainicio)->toDateString())
            ->whereDate('f.created_at','<=',Carbon::parse($request->fechafin)->toDateString())
            ->orderBy('f.id','desc')->paginate(20);
        }else{
            $encabezado = DB::table('facturacionencabezados as f')
    		->join('users as u','f.cliente_id','u.id')
            ->join('users as us','f.vendedor_id','us.id')
    		->select('f.*','u.name','us.name as vendedor')
            ->where('f.tipocomprobantes',"Factura")->orderBy('f.id','desc')->paginate(20);
        }
        
        //

        if($request->fechainicio && $request->fechafin){
            $facturas="Facturas desde la Fecha:".$request->fechainicio."    Hasta la fecha:".$request->fechafin;
        }else{
            $facturas="Facturas Emitidas:";
        }       

        $pdf = \PDF::loadView('exportar.facturas', compact('facturas'),[
            "encabezado"=>$encabezado,
            "empresa"=>$empresa
        ]);
        return $pdf->download('facturas.pdf');
        
    }
}
