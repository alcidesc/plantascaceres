<?php

namespace App\Http\Livewire;
use App\Models\Cabeceracompra;
use App\Models\Proveedor;
use Livewire\WithPagination;
use Livewire\Component;
use Carbon\Carbon;



class TipoPagoCompras extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
     public $fechainicio,$fechafin;

     public function render()
     {
         $query = Cabeceracompra::query()
             ->where('tipoCompra', 2)
             ->where('estado', 1);
     
         if ($this->fechainicio && $this->fechafin) {
             $query->whereDate('created_at', '>=', Carbon::parse($this->fechainicio)->toDateString())
                 ->whereDate('created_at', '<=', Carbon::parse($this->fechafin)->toDateString());
         }
     
         $cabecera = $query->paginate(15);
     
         // Obtener los detalles del proveedor para cada compra
         foreach ($cabecera as $compra) {
             $compra->proveedor = Proveedor::find($compra->proveedor_id);
         }
     
         return view('livewire.tipo-pago-compras', ["cabecera" => $cabecera]);
     }
     
}

