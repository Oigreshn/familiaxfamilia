<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class MostrarVacantes extends Component
{
    protected $listeners = ['eliminarVacante'];
   
    public function eliminarVacante(Vacante $vacante)
    {
        if (Gate::allows('delete', $vacante)){
            if( $vacante->imagen ) {
                Storage::delete('public/vacantes/' . $vacante->imagen);            
            } 
            
            $vacante->delete();
        }
           
    }

    public function render()
    { 
        //Salimos a traer las vacantes segun el usuario logeado en ese momento
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(5);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
