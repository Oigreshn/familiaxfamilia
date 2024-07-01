<?php

namespace App\Livewire;

use App\Models\Habilidad;
use Livewire\Component;

class Habilidades extends Component
{
    public function render()
    {
        $habilidades = Habilidad::all();

        return view('livewire.habilidades',[
            'habilidades' => $habilidades
        ]);
    }
}
