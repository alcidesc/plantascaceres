<?php

namespace App\Http\Livewire;
use App\Models\Facturacionencabezado;
use Livewire\WithPagination;
use Livewire\Component;
use Carbon\Carbon;


class FechaExtraccion extends Component{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $fechainicio,$fechafin;

    public function render()
    {
        $query = Facturacionencabezado::where("tipoPago", "Transferencia Bancaria")
            ->where('estado', 1);

        if ($this->fechainicio && $this->fechafin) {
            $fechainicio = Carbon::parse($this->fechainicio)->startOfDay();
            $fechafin = Carbon::parse($this->fechafin)->endOfDay();

            $query->whereBetween('created_at', [$fechainicio, $fechafin]);
        }

        $encabezado = $query->paginate(15);

        return view('livewire.fecha-extraccion', ["encabezado" => $encabezado]);
    }

}
