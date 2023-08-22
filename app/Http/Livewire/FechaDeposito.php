<?php

namespace App\Http\Livewire;
use App\Models\Cabeceracompra;
use Livewire\WithPagination;
use Livewire\Component;
use Carbon\Carbon;

class FechaDeposito extends Component{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
     public $fechainicio,$fechafin;

    public function render(){
        
        if ($this->fechainicio && $this->fechafin) {
        $cabecera = Cabeceracompra::where("tipoPago", "Transferencia Bancaria")
            ->where('estado', 1)
            ->whereDate('created_at', '>=', Carbon::parse($this->fechainicio)->toDateString())
            ->whereDate('created_at', '<=', Carbon::parse($this->fechafin)->toDateString())
            ->paginate(15);
            }
            $cabecera = Cabeceracompra::where("tipoPago", "Transferencia Bancaria")
            ->where('estado', 1)->paginate(15);
    
        return view('livewire.fecha-deposito', ["cabecera" => $cabecera]);
    }
    
}
