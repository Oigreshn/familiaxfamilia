<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    public function render()
    { 
        //Salimos a traer las vacantes segun el usuario logeado en ese momento
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(5);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
