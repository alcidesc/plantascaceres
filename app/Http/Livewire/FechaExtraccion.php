<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Facturacionencabezado;
use Livewire\WithPagination;
use App\Models\User;
use Auth;
use DB;
use Carbon\Carbon;


class FechaExtraccion extends Component{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $fechainicio,$fechafin;

    public function render(){

        if ($this->fechainicio && $this->fechafin) {
        $encabezado = Facturacionencabezado::where("tipoPago","Transferencia Bancaria")
        ->where('estado',1)
        ->whereDate('created_at', '>=', Carbon::parse($this->fechainicio)->toDateString())
        ->whereDate('created_at', '<=', Carbon::parse($this->fechafin)->toDateString())
        ->paginate(15);
        }
        $encabezado = Facturacionencabezado::where("tipoPago","Transferencia Bancaria")
        ->where('estado',1)->paginate(15);

        return view('livewire.fecha-extraccion',["encabezado"=>$encabezado]);
    }
}
