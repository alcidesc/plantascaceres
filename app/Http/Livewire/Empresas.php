<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use Livewire\WithFileUploads;
use Image, file;

class Empresas extends Component{

    use WithFileUploads;
    
    public $disable="disabled",$empresa_id,$nombre,$info,$ruc,$direccion,$logo,$telefono1,
        $telefono2,$whatsapp,$latitud,$longitud,$facebook,$instagram,$twitter,$correo,
        $fundacion,$lunesingreso,$lunessalida,$martesingreso,$martessalida,$miercolesingreso,
        $miercolessalida,$juevesingreso,$juevessalida,$viernesingreso,$viernessalida,
        $sabadoingreso,$sabadosalida,$domingoingreso,$domingosalida,$delivery,$limitedelivery,
        $costodelivery,$cotizaciondelivery;

    public function mount(){
        $empresa=Empresa::first();
        $this->empresa_id=$empresa->id;
        $this->nombre=$empresa->nombre;
        $this->info=$empresa->info;
        $this->ruc=$empresa->ruc;
        $this->direccion=$empresa->direccion;
        $this->logo=$empresa->logo;
        $this->telefono1=$empresa->telefono1;
        $this->telefono2=$empresa->telefono2;
        $this->whatsapp=$empresa->whatsapp;
        $this->latitud=$empresa->latitud;
        $this->longitud=$empresa->longitud;
        $this->facebook=$empresa->facebook;
        $this->instagram=$empresa->instagram;
        $this->twitter=$empresa->twitter;
        $this->correo=$empresa->correo;
        $this->fundacion=$empresa->fundacion;
        $this->lunesingreso=$empresa->lunesingreso;
        $this->lunessalida=$empresa->lunessalida;
        $this->martesingreso=$empresa->martesingreso;
        $this->martessalida=$empresa->martessalida;
        $this->miercolesingreso=$empresa->miercolesingreso;
        $this->miercolessalida=$empresa->miercolessalida;
        $this->juevesingreso=$empresa->juevesingreso;
        $this->juevessalida=$empresa->juevessalida;
        $this->viernesingreso=$empresa->viernesingreso;
        $this->viernessalida=$empresa->viernessalida;
        $this->sabadoingreso=$empresa->sabadoingreso;
        $this->sabadosalida=$empresa->sabadosalida;
        $this->domingoingreso=$empresa->domingoingreso;
        $this->domingosalida=$empresa->domingosalida;
        $this->delivery=$empresa->delivery;
        $this->limitedelivery=$empresa->limitedelivery;
        $this->costodelivery=$empresa->costodelivery;
        $this->cotizaciondelivery=$empresa->cotizaciondelivery;
    }

    public function render(){
        return view('livewire.empresas');
    }

    public function edit(){
        $empresa=Empresa::first();
        $this->disable="";
        $this->emit('info', $empresa->info);
    }

    public function update(){

        $validatedDate = $this->validate([
            'nombre' => 'required',
            'info' => 'required',
            'direccion' => 'required',
            'telefono1' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'fundacion' => 'required',
            'delivery' => 'required',
        ]);

        $empresa=Empresa::find($this->empresa_id);
            $empresa->nombre=$this->nombre;
            $empresa->info=$this->info;
            $empresa->ruc=$this->ruc;
            $empresa->direccion=$this->direccion;

            $nombre='';
            if(is_object($this->logo)) {
                $file = $this->logo;
                $control=0;
                $nombre = rand().".".$file->getClientOriginalExtension();
                while ($control == 0) {
                    if (is_file( public_path() . '/images/empresa/' . $nombre )) {
                        $nombre = rand() . $nombre;
                    }else{
                        Image::make($this->logo)
                            ->heighten(1000)
                            ->save(public_path() . '/images/empresa/' . $nombre);
                        $control=1;
                    }
                }
            }
            if($nombre){
                $empresa->logo=$nombre;
            }
            
            $empresa->telefono1=$this->telefono1;
            $empresa->telefono2=$this->telefono2;
            $empresa->whatsapp=$this->whatsapp;
            $empresa->latitud=$this->latitud;
            $empresa->longitud=$this->longitud;
            $empresa->facebook=$this->facebook;
            $empresa->instagram=$this->instagram;
            $empresa->twitter=$this->twitter;
            $empresa->correo=$this->correo;
            $empresa->fundacion=$this->fundacion;
            $empresa->lunesingreso=$this->lunesingreso;
            $empresa->lunessalida=$this->lunessalida;
            $empresa->martesingreso=$this->martesingreso;
            $empresa->martessalida=$this->martessalida;
            $empresa->miercolesingreso=$this->miercolesingreso;
            $empresa->miercolessalida=$this->miercolessalida;
            $empresa->juevesingreso=$this->juevesingreso;
            $empresa->juevessalida=$this->juevessalida;
            $empresa->viernesingreso=$this->viernesingreso;
            $empresa->viernessalida=$this->viernessalida;
            $empresa->sabadoingreso=$this->sabadoingreso;
            $empresa->sabadosalida=$this->sabadosalida;
            $empresa->domingoingreso=$this->domingoingreso;
            $empresa->domingosalida=$this->domingosalida;
            $empresa->delivery=$this->delivery;
            $empresa->limitedelivery=$this->limitedelivery;
            $empresa->costodelivery=$this->costodelivery;
            $empresa->cotizaciondelivery=$this->cotizaciondelivery;
        if($empresa->update()){
            $this->disable="disabled";
            $this->emit('info', "");
            $this->emit('alert', ['type' => 'success', 'message' => 'Empresa editada correctamente!']);
        }
    }
}
